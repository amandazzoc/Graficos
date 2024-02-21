<?php 

include_once('conexao.php');

$postjson = json_decode(file_get_contents('php://input'), true);


$query = $pdo->prepare("SELECT * FROM dados");

$query->execute();

$res = $query->fetchAll(PDO::FETCH_ASSOC);



for ($i=0; $i < count($res); $i++) { 
      $dados[] = array(
        'id' => $res[$i]['id'],
        'alimentacao' => $res[$i]['alimentacao'],
    );

}


if(count($res) > 0){
    $result = json_encode(array('success'=>true, 'resultado'=>@$dados));
}else{
    $result = json_encode(array('success'=>false, 'resultado'=>'0'));
}

echo $result;

?>                                                                             