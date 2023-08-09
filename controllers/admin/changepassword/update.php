<?php 


use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id= $_SESSION['user']['id'];

$opassword= $_POST['opassword'];
$npassword= $_POST['npassword'];
$cnpassword= $_POST['cnpassword'];



$user=$db->query('select password from employees where id = :id', [
    'id' => $id,
   
    ])->find();



$errors=[];

if(! Validator::string($npassword,7,255))
{
    $errors['opassword']= "Please a provide a valid password";
}

if(! empty($errors))
{
    return view('/admin/changepassword/edit.view.php',[
        'heading' => 'Change Password',
        'errors' => $errors
    ]);
}


if (password_verify($opassword, $user['password']) && ! password_verify($opassword,password_hash($cnpassword, PASSWORD_BCRYPT)) && ! password_verify($opassword,password_hash($npassword, PASSWORD_BCRYPT))) 
    {
        if (password_verify($npassword,password_hash($cnpassword, PASSWORD_BCRYPT)))
        {
            $db->query('UPDATE  employees set password= :password where id=:id',[
                'password' => password_hash($npassword, PASSWORD_BCRYPT),
                'id' => $id
            ]);
            
            $errors['opassword']= "Password changed successfully";
            return view('/admin/changepassword/edit.view.php',[
                'heading' => 'Change Password',
                'errors' => $errors
            ]);
            exit();
        }
        else
        {
            $errors['opassword']= "New passwords don't match";
            return view('/admin/changepassword/edit.view.php',[
                'heading'=> 'Change Password',
                'errors' => $errors     
            ]);
            exit();
        }
    }
    else{
        $errors['opassword']= "Old Password doesn't match or New password entered is similar to Old password";
    return view('/admin/changepassword/edit.view.php',[
        'heading'=> 'Change Password',
        'errors' => $errors     
    ]);
    }


    


