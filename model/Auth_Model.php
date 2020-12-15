<?php
require_once '../library/process.php';

class Auth extends dbconnection
{
    public $errors;

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM Customer WHERE email='$email' LIMIT 1";
        $result = $this->mysqli->query($query);
        return $result;
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM Customer WHERE user_id=$id";
        $result = $this->mysqli->query($query);
        return $result;
    }

    public function loginUser($email, $password)
    {
        $result = $this->getUserByEmail($email);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                if ($user['verified'] === '0') {
                    $link = '<a href="#" type="button" data-toggle="modal" data-target="#modalResentVerify">Re-send email here </a>';
                    $this->errors = "This email doesn't verified yet. Please check your email! Haven't received email yet? " . $link;
                    return false;
                } else {
                    $_SESSION['id'] = $user['user_id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['login'] = true;
                    return true;
                    exit();
                }
            } else {
                $this->errors = "Wrong Password";
                return false;
            }
        } else {
            $this->errors = "Email doesn't exists";
            return false;
        }
    }

    public function regUser($email, $name, $token, $password)
    {
        $result = $this->getUserByEmail($email);

        if ($result->num_rows === 0) {
            $query = "INSERT INTO Customer SET name=?, email=?, password=?, token=?";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssss', $name, $email, $password, $token);
            $insert_data = $stmt->execute();

            if ($insert_data) {
                $user_id = $stmt->insert_id;
                $stmt->close();
                return $user_id;
            } else {
                $this->errors = "Error while inserting data. Please Try again";
                return false;
            }
        } else {
            $this->errors = "the email is already register. Please try login";
            return false;
        }
    }

    public function verify($id, $token)
    {
        $stmt = "SELECT * FROM Customer WHERE user_id = '$id' AND token = '$token'";
        $verify = $this->mysqli->query($stmt);

        if ($verify->num_rows === 1) {
            $query = "UPDATE Customer SET verified = '1' WHERE user_id = $id AND token = '$token'";
            $result = $this->mysqli->query($query);
            return true;
        } else {
            return false;
        }
    }

    public function resentVerify($email, $token)
    {
        $query = "SELECT * FROM Customer WHERE email='$email'";
        $result = $this->mysqli->query($query);

        if ($result->num_rows === 1) {
            $user_data = $result->fetch_assoc();
            $user_id = $user_data['user_id'];

            $query = "UPDATE Customer SET token=? WHERE user_id=? ";
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('si', $token, $user_id);
            $insert_data = $stmt->execute();

            if ($insert_data) {
                $stmt->close();
                return $user_id;
            } else {
                $this->error = "Error while try resend the email. PLeas Try Again.";
                return false;
            }
        } else {
            $this->errors = "Email doesn't exists. Please register first!";
            return false;
        }
    }

    public function editUserById($id, $name, $phone, $address)
    {
        $query = "UPDATE Customer SET name='$name', phone='$phone', address='$address' WHERE user_id='$id'";
        $result = $this->mysqli->query($query);
        if ($result) {
            $_SESSION['name'] = $name;
            return true;
        } else {
            return false;
        }
    }
}
