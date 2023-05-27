<?phP
session_start();
require_once "db_conne.php";
$vale = $_POST['answer'];
//echo $vale;
$answer = $_POST['answertext'];
//echo $answer;
$quizId = $_POST['quizID'];

$query = "INSERT INTO answers(quizId, questionId, answer) VALUES ('$quizId','$vale','$answer')";
echo $query;
$result = mysqli_query($con,$query);


if(isset($_POST['correct'])) {
    $query3 = "SELECT answerId FROM answers WHERE answer = '$answer' ";
    echo $query3;
    $result3 = mysqli_query($con,$query3);
    $row3 = mysqli_fetch_assoc($result3);
    $answerId = $row3['answerId'];


    $query2 = "UPDATE questions SET answerId = '$answerId' WHERE questionId = '$vale'";
    echo $query2;
    $result2 = mysqli_query($con,$query2);
    header("location:choosequiztoedit.php");
}
else {
    header("location:choosequiztoedit.php");

}


?>