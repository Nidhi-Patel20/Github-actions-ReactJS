<?php

require_once 'vendor/autoload.php';
Requests::register_autoloader();

//var_dump($argv);
//var_dump($_ENV);

echo "::debug ::Sending a request to slack\n";

echo 'Just a message';

$response = Requests::post(
     "https://hooks.slack.com/services/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",
    array(
        'Content-type' => 'application/json'
    ),
    json_encode(array(
        
        'blocks' => 
        array (
            array (
                "type" => "section",
                "text" => array (
                    "type" => "mrkdwn",
                    "text" => "*Event:*\n{$_ENV['GITHUB_EVENT_NAME']}"
                    #"You have a new request:\n*<fakeLink.toEmployeeProfile.com|Fred Enriquez - New device request>*",
                ),
                
                ),
            ),
            array (
                "type" => "section",
                "fields" => array (
                    array (
                        "type" => "mrkdwn",
                        "text" => #"*Type:*\nComputer (laptop)",
                        "*Repository:*\n{$_ENV['GITHUB_REPOSITORY']}",
                    ),
                    array (
                        "type" => "mrkdwn",
                        "text" => "*SHA:*\n{$_ENV['GITHUB_SHA']}",
                    ),
 
                ),
            ),
         )
        
        )
);

echo "::group::Slack Response\n";
var_dump($response);
echo '::endgroup::\n';

if(!$response->success) {
    echo $response->body;
    exit(1);
}