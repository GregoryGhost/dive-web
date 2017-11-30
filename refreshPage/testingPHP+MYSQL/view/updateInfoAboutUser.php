<?PHP
function checkDataOfUser($name){
    include "connectToDB.php";
    $tableUser = "test";
    $data = $name;
    if(is_string($data)){
        $lengthData = strlen($data);
        if($lengthData > 0 && $lengthData <=50){
            $query = "UPDATE $tableUser SET name='$data' WHERE name='Кексик'";
            $result = mysqli_query($link, $query);
            if($result){
                print("Success update data");
            } else{                                           
                print("В таблице ". $tableUser . mysqli_error($link));
            }                                           
    
        }else{
            print("Данные не удовлетворяют требованиям длины - больше нуля и не больше 50");
        }
    }else{
        print("Данные не являются строкой");
    }
  mysqli_close($link);
}
    if(isset($_POST["name"]) && $_POST["name"] != ''){
     checkDataOfUser($_POST["name"]);
    }

?>
