<?php


namespace App\Services;



class OneSignalNotificationSender
{
    public array $playersIds;
    public string $message;
    protected string|bool $serializeField;

    public function __construct(array $playersIds, string $message)
    {
        $this->playersIds = $playersIds;
        $this->message = $message;
    }


    protected function setConfig()
    {
        $content = ['fr' => $this->message];
        $headings = ['fr' => "Gemma"];

        $fields =
        [
            'app_id' => config('onesignal.app_id'),
            'included_segments'=> array('included_player_ids'),
            'include_player_ids' => $this->playersIds,
            'data' => array("foo" => "bar"),
            'content_available'=>true,
            'small_icon'=> "ic_notification_icon",
            'contents' => $content,
            'headings' => $headings,
        ];
        $this->serializeField = json_encode($fields);
    }


    public function sendNotification()
    {
        $this->setConfig();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ' . config('onesignal.api_key')
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->serializeField);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
    }
}
