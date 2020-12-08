<?php

/**
 * PHP version 7.4
 * ResultsDoctrine - controllers.php
 *
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es/ ETS de Ingeniería de Sistemas Informáticos
 */

use MiW\Results\Entity\User;
use MiW\Results\Entity\Result;
use MiW\Results\Utility\Utils;

function functionHomePage()
{
    global $routes;

    $rutaListUsers = $routes->get('ruta_user_list')->getPath();
    $routeCreateUser = $routes->get('route_user_create')->getPath();
    $routeDeleteUser = $routes->get('route_user_delete')->getPath();
    $routeUpdateUser = $routes->get('route_user_update')->getPath();
    $routeDeleteAnyoneUser=$routes->get('route_user_anyone')->getPath();

    $routeListResults = $routes->get('route_result_list')->getPath();
    $routeCreateResult= $routes->get('route_result_create')->getPath();
    $routeDeleteResults=$routes->get('route_result_delete')->getPath();
    $routeUpdateResults=$routes->get('route_result_update')->getPath();
    $routeDeleteAnyoneResult=$routes->get('route_result_anyone')->getPath();

    echo <<< ____MARCA_FIN
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- 引入jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- 引入BootstrapCss -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>List Users</h3>
                <form class="" action="$rutaListUsers" method="GET" enctype="multipart/form-data">
                    <input type="submit" value="List Users"/>
                </form>
                <h4>------☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆------</h4>
                <h3>Creat User</h3>
                <form class="" action="$routeCreateUser" method="POST" enctype="multipart/form-data">
                    <label for="newUserName">Username</label>
                    <input type="text" name="newUserName" size="20" placeholder="Username"/></br>
                    <label for="newUserEmail">Email</label>
                    <input type="text" name="newUserEmail" size="20" placeholder="Email"/></br>
                    <label for="newUserPassword">Password</label>
                    <input type="password" name="newUserPassword" size="20" placeholder="Password"/></br>
                    <label for="isEnabled">Enabled</label>
                    <input type="checkbox" name="isEnabled" value="1"/></br>
                    <label for="isAdmin">Admin</label>
                    <input type="checkbox" name="isAdmin"  value="1"/></br>
                    <input type="submit" value="Create User"/>
                </form>
                <h4>------☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆------</h4>
                <h3>Delete All User</h3>
                <form class="" action="$routeDeleteUser" method="POST" enctype="multipart/form-data">
                    <input type="submit" value="Delete All Users"/>
                </form>
                <h4>------☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆------</h4>
                <h3>Delete Anyone User</h3>
                <form class="" action="$routeDeleteAnyoneUser" method="POST" enctype="multipart/form-data">
                    <label for="UserName">Please input UserName</label>
                    <input type="text" name="deleteUserName" size="20" placeholder="Username"/></br>
                    <input type="submit" value="Find User">
                </form>
                <h4>------☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆------</h4>
                <h3>Update User</h3>
                    <form class="" action="$routeUpdateUser" method="POST" enctype="multipart/form-data">
                    <label for="existingUserName">ExistingUserName</label>
                    <input type="text" name="existingUserName" size="20"/><br/>
                    <label for="updateUserName">NewUsername</label>
                    <input type="text" name="updateUserName" size="20" placeholder="Username"/></br>
                    <label for="updateUserEmail">NewEmail</label>
                    <input type="text" name="updateUserEmail" size="20" placeholder="Email"/></br>
                    <label for="updateUserPassword">NewPassword</label>
                    <input type="password" name="updateUserPassword" size="20" placeholder="Password"/></br>
                    <label for="isEnabled">Enabled</label>
                    <input type="checkbox" name="updateIsEnabled"  value="1"/></br>
                    <input type="submit" value="Update User"/>
                    </form>
            </div>
            <div class="col-md-6">
                <h3>List Results</h3>
                <form class="" action="$routeListResults" method="GET" enctype="multipart/form-data">
                    <input type="submit" value="List Results"/>
                </form>
                <h4>------☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆------  </h4>
                <h3>Creat Result</h3>
                <form action="$routeCreateResult" method="POST" enctype="multipart/form-data">
                    <label for="getUsername">Username:</label>
                    <input type="text"  name="getUsername" size="10"/></br>
                    <label for="newResult">Result:</label>
                    <input type="text"  name="newResult" size="10"/></br>
                    <input type="submit" value="Create Result"/>
                </form>
                <h4>------☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆------  </h4>
                <h3>Delete All Results</h3>
                <form class="" action="$routeDeleteResults" method="POST" enctype="multipart/form-data">
                       <input type="submit" value="Delete Results"/>
                </form>
                <h4>------☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆------  </h4>
                <h3>Delete Anyone Result</h3>
                <form class="" action="$routeDeleteAnyoneResult" method="POST" enctype="multipart/form-data">
                    <label for="deleteAnyoneResult">Please enter input existing ResultID</label> 
                    <input type="text" name="deleteAnyoneResult" size="20" placeholder="ResultID"/></br>
                    <input type="submit" value="Delete Result"/>
                </form>
                <h4>------☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆------  </h4>
                <h3>Update Result</h3>
                <form class="" action="$routeUpdateResults" method="POST" enctype="multipart/form-data">
                    <label for="updateResultID">Please enter input existing ResultID</label>
                    <input type="text" name="updateResultID" size="20" placeholder="ResultID"/></br>
                    <label for="updateUserID">Please enter input existing UserID</label>
                    <input type="text" name="updateUserID" size="20" placeholder="UserID"/></br>
                    <label for="updateResult">NewResult</label>
                    <input type="text" name="updateResult" size="20" placeholder="NewResult"/></br>
                    <input type="submit" value="Update Result"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
    

____MARCA_FIN;
}

function functionListAllUsers(): void
{
    $entityManager = Utils::getEntityManager();
    $userRepository = $entityManager->getRepository(User::class);
    $users = $userRepository->findAll();
    echo json_encode($users,JSON_PRETTY_PRINT);


}

function functionUser():void
{
//    echo "For test route functionUser" .PHP_EOL;
    $entityManager = Utils::getEntityManager();

    $username =filter_input(INPUT_POST,'deleteUserName');

    if($username===null){
        echo "User $username not found" .PHP_EOL;
    }
    $user=$entityManager->getRepository(User::class)->findOneBy(['username'=>$username]);

    $entityManager->remove($user);
    $entityManager->flush();
    echo "Delete successfully" .PHP_EOL;


}

function functionCreateUser(): void
{
//    echo "For test route functionCreateUser" .PHP_EOL;
    $entityManager=Utils::getEntityManager();

    $newUsername =filter_input(INPUT_POST,'newUserName');
    $newEmail    =filter_input(INPUT_POST,'newUserEmail',FILTER_VALIDATE_EMAIL);
    $newPassword =filter_input(INPUT_POST,'newUserPassword');

    $newUserEnabled=isset($_POST['isEnabled']);
    $newUserAdmin=isset($_POST['isAdmin']);

    $user=new User();
    $user->setUsername($newUsername);
    $user->setEmail($newEmail);
    $user->setPassword($newPassword);
    $user->setEnabled($newUserEnabled);
    $user->isAdmin($newUserAdmin);

    echo json_encode($user,JSON_PRETTY_PRINT);
    try {
        $entityManager->persist($user);
        $entityManager->flush();
    }catch(Exception $exception){
        echo $exception->getMessage() .PHP_EOL;
    }
}

function functionDeleteAllUsers(): void
{
//    echo "For test route functionDeleteAllUsers" .PHP_EOL;
    $entityManager = Utils::getEntityManager();
    $users = $entityManager->getRepository(User::class)->findAll();

    if(empty($users)){
        echo "There are no users" .PHP_EOL;
    }else{
        foreach($users as $user){
            $entityManager->remove($user);
            $entityManager->flush();
        }
        echo "Delete successfully" .PHP_EOL;
    }
}

function functionUpdateUser():void
{
//    echo "For test route functionUpdateUser" .PHP_EOL;
    $entityManager = Utils::getEntityManager();

    $existingUserName = filter_input(INPUT_POST,'existingUserName');
    $updateUserName =filter_input(INPUT_POST,'updateUserName');
    $updateUserEmail =filter_input(INPUT_POST,'updateUserEmail',FILTER_VALIDATE_EMAIL);
    $updateUserPassword =filter_input(INPUT_POST,'updateUserPassword');
    $updateIsEnabled=isset($_POST['updateIsEnabled']);
    $user=$entityManager->getRepository(User::class)->findOneBy(['username' =>$existingUserName]);

    if(null===$user){
        echo "User $existingUserName not found" .PHP_EOL;
    }

    if ($updateUserName!==''){
        $user->setUsername($updateUserName);
    }
    if($updateUserEmail!==''){
        $user->setEmail($updateUserEmail);
    }
    if($updateUserPassword!==''){
        $user->setPassword($updateUserPassword);
    }
    if($updateIsEnabled==='true'|| $updateIsEnabled==='false'){

        $user->setEnabled($updateIsEnabled);
    }
    try {
        $entityManager->persist($user);
        $entityManager->flush();
        echo json_encode($user, JSON_PRETTY_PRINT);
    }catch(Exception $exception){
        echo $exception->getMessage() .PHP_EOL;
    }
}

function functionListAllResults(): void
{
    $entityManager = Utils::getEntityManager();
    $results = $entityManager->getRepository(Result::class)->findAll();
    echo json_encode($results,JSON_PRETTY_PRINT);
}

function functionResult():void
{
    $entityManager = Utils::getEntityManager();
    $resultId=filter_input(INPUT_POST,'deleteAnyoneResult');
    $result = $entityManager->getRepository(Result::class)->findOneBy(['id' => $resultId]);

    if($result===null){
        echo "Result $resultId not found" . PHP_EOL;
    }else{
        $entityManager->remove($result);
        $entityManager->flush();
        echo "Result $resultId delete sufficiently" . PHP_EOL;
    }

}

function functionCreateResult():void
{
//    echo "For test route functionCreateResult" .PHP_EOL;
    $entityManager = Utils::getEntityManager();
    $newUsername = filter_input(INPUT_POST, 'getUsername');
    $newResult = filter_input(INPUT_POST, 'newResult');
    $newTimestamp = new DateTime('now');

    $user = $entityManager->getRepository(User::class)->findOneBy(['username' => $newUsername]);
    if (null === $user) {
        echo "User $newUsername not found" . PHP_EOL;
    }
    $result = new Result($newResult, $user, $newTimestamp);

    $entityManager->persist($result);
    $entityManager->flush();

    echo json_encode($result, JSON_PRETTY_PRINT);

}

function functionDeleteAllResults():void
{
//    echo "For test route functionDeleteAllResults" .PHP_EOL;
    $entityManager = Utils::getEntityManager();
    $results=$entityManager->getRepository(Result::class)->findAll();
    if(empty($results)){
        echo "Result is null" .PHP_EOL;
    }else{
        foreach($results as $result){
            $entityManager->remove($result);
            $entityManager->flush();
        }
        echo "Deleted Result sufficiently".PHP_EOL;
    }
}

function functionUpdateResult():void
{
//    echo "For test route functionUpdateResult" .PHP_EOL;
    $entityManager = Utils::getEntityManager();

    $updateResultID=filter_input(INPUT_POST,'updateResultID');
    $updateUserID=filter_input(INPUT_POST,'updateUserID');
    $updateResult=filter_input(INPUT_POST,'updateResult');
    $newTimestamp = new DateTime('now');

    $result=$entityManager->getRepository(Result::class)->findOneBy(['id'=>$updateResultID]);
    $user=$entityManager->getRepository(User::class)->findOneBy(['id' =>$updateUserID]);

    if($result===null){
        echo "Result $updateResultID not found" . PHP_EOL;
        exit(0);
    }
    if($user===null){
        echo "User $updateUserID not found" . PHP_EOL;
        exit(0);
    }
    if ($updateUserID > 0){
        $result->setUser($user);
    }

    if ($updateResult > 0){
        $result->setResult($updateResult);
    }

    $result->setTime($newTimestamp);

    try {
        $entityManager->persist($result);
        $entityManager->flush();
        echo json_encode($result, JSON_PRETTY_PRINT);
    } catch (Exception $exception) {
        echo $exception->getMessage() .PHP_EOL;
    }


}




