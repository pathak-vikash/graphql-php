<?php
require("./vendor/autoload.php");
require("./resolver.php");
require("./query.php");

use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Utils\BuildSchema;
/* 
$schema = new Schema([
    'query' => $queryType
]); */



$contents = file_get_contents('schema.graphql');
$schema = BuildSchema::build($contents);

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
$query = $input['query'];
$variableValues = isset($input['variables']) ? $input['variables'] : null;

/*
print_r($query);
print_r($variableValues);
*/

try {
    $rootValue = ['prefix' => 'You said: '];

    $result = GraphQL::executeQuery(
        $schema, 
        $query, 
        $rootValue, 
        $context = null, 
        $variableValues, 
        $operationName = null,
        new MyCustomResolver(), // Rather inject it through DI, though
        $validationRules = null
    );

    //$result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
    $output = $result->toArray();
} catch (\Exception $e) {
    $output = [
        'errors' => [
            [
                'message' => $e->getMessage()
            ]
        ]
    ];
}


header('Content-Type: application/json');
echo json_encode($output);