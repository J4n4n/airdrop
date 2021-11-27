<?php
// توکن ربات در خط زیر
$TOKEN = '1796772720:AAH-n3gu0DKSe3PHb7fP5ciCkUHhpEWM5AE';
define('KEY', $TOKEN);

/*
@jahanbots
••••••••••••••••••••••••••••••••••••••••••
کانال پر از سورس های منتوع 
jahanbots 
https://t.me/jahanbots
https://t.me/jahanbots
https://t.me/jahanbots
••••••••••••••••••••••••••••••••••••••••••
کص ننت اصکی بری منبع نزنی 
•••••••••••••••••••••
اصکی با منبع ازاد ✓
•••••••••••••••••••••
@jahanbots
*/
//اطلاعات دیتا بیس در اینجا
@$server = 'localhost';
@$username = 'wiheonws_bet';
@$password = 'JxlPL03yopWu';
@$db = 'wiheonws_bet';
$conn = mysqli_connect($server,$username,$password,$db);
mysqli_set_charset($conn, 'utf8');
$GLOBALS['conn'] = $conn;
$backKey = array(array("برگشت🔙"));
$arzname = "PHT";
$ArzPerReferral = 4;
$ArzInStart = 1;
$GLOBALS['arzname'] = $arzname;
$GLOBALS['ArzPerReferral'] = $ArzPerReferral;
$GLOBALS['ArzInStart'] = $ArzInStart;
// ای دی عددی ادمین
$admin = 1398503436;
$supportAdmin = 1398503436;
include_once 'jdf.php';
// ای دی کانال ها با @
$lockChannel1 = "@jahanbots";
$lockChannel2 = "@jahanbots";
$lockChannel3 = "@jahanbots";
$lockChannel4 = "@jahanbots";
$lockChannel5 = "@jahanbots";
$lockChannel6 = "@jahanbots";
$botID = "jahanbots";
// ای دی ربات با @
$transitionChannel = "jahanbots";
// ای دی کانال پرداختی ها
$botIconLink = "https://t.me//7853";
$withrawHelpImageLink = "https://t.me//7854";
//••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••
$minBalanceForWithraw = "40";

function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {

        var_dump(curl_error($ch));

    } else {
        return json_decode($res);
    }
}

function sendm($chat_id, $text, $mode)
{
    $res = bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => $mode,
        'disable_web_page_preview' => true
    ]);
    return $res;
}

function sendmk($text, $payam_id, $chat_id, $options, $mode)
{
    $keyboard = array(
        'keyboard' => $options,
        'resize_keyboard' => true,
        'selective' => true,
        'one_time_keyboard' => false
    );
    $keyboard = json_encode($keyboard);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => $mode,
        'reply_markup' => $keyboard,
        'reply_to_message_id' => $payam_id,
        'disable_web_page_preview' => true
    ]);
}

function answerQuery($id, $alert, $text)
{
    bot('answerCallbackQuery', [
        'callback_query_id' => $id,
        'text' => $text,
        'show_alert' => $alert
    ]);
}

function status($conn, $admin, $chat_id)
{
    $getStatus = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `status`"));

    $on = $getStatus['status'] == 1;

    if ($on) {
        return true;
    } else {
        if ($chat_id != $admin) {
            return false;
        } else {
            return true;
        }
    }

}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;

$text = $message->text;
$chat_id1 = $message->chat->id;
$first_name = $message->chat->first_name;
$last_name = $message->chat->last_name;
$username = $message->chat->username;
$message_id = $message->message_id;

$forwarded_username = $message->forward_from->username;
$forwarded_fullname = $message->forward_from->first_name;
$forwarded_id = $message->forward_from->id;

$data = $update->callback_query->data;
$chat_id_callback = $update->callback_query->message->chat->id;

$chat_id_when_inlineKeyboard_click = $update->callback_query->from->id;

$answer_id = $update->callback_query->id;

$message_id_when_inlineKeyboard_click = $update->callback_query->message->message_id;

$first_name_when_inlineKeyboard_click = $update->callback_query->from->first_name;
$last_name_when_inlineKeyboard_click = $update->callback_query->from->last_name;
$type = $update->message->chat->type;
$reply_chat_id = $update->message->reply_to_message->forward_from->id;
$reply_to_message_chat_id = $update->message->reply_to_message->from->id;
$reply_to_message_firstname = $update->message->reply_to_message->from->first_name;
$inline_id = $update->inline_query->id;
$inline_chatID = $update->inline_query->from->id;
$inline_text = $update->inline_query->query;
$inline_firstname = $update->inline_query->from->first_name;
$inline_lastname = $update->inline_query->from->last_name;

$user_chat_id_in_gp = $message->from->id;

file_put_contents("test.txt", json_encode($update));


$fullname = "";
if ($first_name_when_inlineKeyboard_click != null) {
    $fullname = $first_name_when_inlineKeyboard_click . " " . $last_name_when_inlineKeyboard_click;
} else {
    $fullname = $first_name . " " . $last_name;
}

$fullname = str_replace("'", "", $fullname);
$fullname = str_replace('"', "", $fullname);
$fullname = str_replace('-', "", $fullname);
$fullname = str_replace('\\', "", $fullname);
$fullname = str_replace('/', "", $fullname);

$chat_id = "";
if ($chat_id_when_inlineKeyboard_click != 0) {
    $chat_id = $chat_id_when_inlineKeyboard_click;
} else {
    $chat_id = $chat_id1;
}

if (!status($conn, $admin, $chat_id)) {
    sendm($chat_id, "ربات فعلا خاموش است.", 'markdown');
    exit();
}

$GLOBALS['text'] = $text;

$getSteep = mysqli_query($conn, "SELECT * FROM `steeps` WHERE `chat_id`='$chat_id'");
$steep = "";
while ($gs = mysqli_fetch_array($getSteep)) {
    $steep = $gs['steep'];
}
function getSteepInfo($conn, $steep, $chat_id)
{
    $steep_info_res = mysqli_query($conn, "SELECT * FROM `steepInfo` WHERE `chat_id`='$chat_id' AND `steep`='$steep'");
    $steep_info = "";
    while ($row = mysqli_fetch_array($steep_info_res)) {
        $steep_info = $row['info'];
    }
    return $steep_info;
}

function setSteepInfo($conn, $steep, $info, $chat_id)
{
    mysqli_query($conn, "INSERT INTO `steepInfo`(`chat_id`, `steep`, `info`) VALUES ('$chat_id','$steep','$info')");
}


function setSteep($chat_id, $conn, $steep)
{
    mysqli_query($conn, "INSERT INTO `steeps`(`chat_id`, `steep`) VALUES ('$chat_id','$steep')");
}

function deleteAllSteeps($conn, $chat_id)
{
    mysqli_query($conn, "DELETE FROM `steeps` WHERE `chat_id`='$chat_id'");
    mysqli_query($conn, "DELETE FROM `steepInfo` WHERE `chat_id`='$chat_id'");
}

function deleteSteep($conn, $steep, $chat_id)
{
    mysqli_query($conn, "DELETE FROM `steeps` WHERE `chat_id`='$chat_id' AND `steep`='$steep'");
}

function deleteSteepInfo($conn, $chat_id, $steep)
{
    mysqli_query($conn, "DELETE FROM `steepInfo` WHERE `chat_id`='$chat_id' AND `steep`='$steep'");
}

$startText = "سلام خوش اومدی.";
$mainKey = array(
    array('حساب کاربری 👤', 'زیرمجموعه گیری 🚸', 'تسویه حساب 📤'),
    array("گزارش تسویه حساب 📊", 'پشتیبانی⛑')
);

if ($text == "برگشت🔙") {
    deleteAllSteeps($conn, $chat_id);

    sendmk($startText, $message_id, $chat_id, $mainKey, 'markdown');

    exit();

}

//==============callbacks==============
if (strpos($data, "unlock") !== false) {
    if (checkJoin($chat_id, $lockChannel1) && checkJoin($chat_id, $lockChannel2) && checkJoin($chat_id, $lockChannel3) && checkJoin($chat_id, $lockChannel4) && checkJoin($chat_id, $lockChannel5) && checkJoin($chat_id, $lockChannel6)) {
        $txt = str_replace("unlock", "", $data);

        bot('deleteMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id_when_inlineKeyboard_click
        ]);
        register($chat_id, $update->callback_query->from->username, $fullname, $txt);
        sendmk($startText, null, $chat_id, $mainKey, 'markdown');
    } else {
        answerQuery($answer_id, false, "درتمامی کانال ها عضو نشده اید");
    }
    exit();

} else if (strpos($data, "sent") !== false) {
    $reqID = str_replace("sent", "", $data);

    $getData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `withraws` WHERE `ID`='$reqID'"));

    $usr = $getData['chat_id'];
    $amount = $getData['amount'];
    $wallet = $getData['wallet'];

    setSteepInfo($conn, "user", $usr, $chat_id);
    setSteepInfo($conn, "amount", $amount, $chat_id);
    setSteepInfo($conn, "id", $reqID, $chat_id);

    bot('deleteMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id_when_inlineKeyboard_click
    ]);
    sendmk("شما درحال واریز تعداد $amount $arzname به والت `$wallet` هستید\nلینک تراکنش را وارد کنید:", null, $chat_id, $backKey, 'markdown');

    setSteep($chat_id, $conn, "sendingTxid");

    exit();


} else if (strpos($data, "rejectTransition") !== false) {
    $reqID = str_replace("rejectTransition", "", $data);

    $getRequest = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `withraws` WHERE `ID`='$reqID'"));

    $user = $getRequest['chat_id'];
    $amount = $getRequest['amount'];
    $wallet = $getRequest['wallet'];

    $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$user'"));

    $userBalance = $getUser['balance'];

    $newUserBalance = $userBalance + $amount;

    mysqli_query($conn, "UPDATE `users` SET `balance`='$newUserBalance' WHERE `chat_id`='$user'");
    bot('deleteMessage', ['chat_id' => $chat_id, 'message_id' => $message_id_when_inlineKeyboard_click]);
    sendm($user, "درخواست برداشت شما به مقدار $amount $arzname به والت `$wallet` رد شد و مقدار آن به موجودی شما برگشت داده شد.", 'markdown');


    exit();

} else if (strpos($data, "request") !== false) {
    $reqId = str_replace("request", "", $data);

    $request = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `withraws` WHERE `ID`='$reqId'"));

    $amount = $request['amount'];
    $wallet = $request['wallet'];
    $chat_id = $request['chat_id'];

    $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$chat_id'"));

    $balance = $getUser['balance'];
    if ($amount > $balance) {
        answerQuery($answer_id, false, "خطا!");
        bot('deleteMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id_when_inlineKeyboard_click
        ]);
        exit();
    }

    bot('deleteMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id_when_inlineKeyboard_click
    ]);

    sendmk("درخواست شما ثبت شد.", $message_id, $chat_id, $mainKey, 'markdown');

    $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$chat_id'"));

    $newBalance = $getUser['balance'] - $amount;

    mysqli_query($conn, "UPDATE `users` SET `balance`='$newBalance' WHERE `chat_id`='$chat_id'");

    $user = "[$chat_id](tg://user?id=$chat_id)";

    bot('sendMessage', [
        'chat_id' => $admin,
        'text' => "درخواست واریز از کاربر $user\nمقدار: $amount $arzname\nکیف پول: `$wallet`",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "واریز شد ✅", 'callback_data' => "sent$reqId"], ['text' => "رد شد ❌", 'callback_data' => "rejectTransition$reqId"]
                ]
            ]
        ]),
        'parse_mode' => 'markdown'
    ]);

    $now = jdate('Y/m/d H:i:s');

    mysqli_query($conn, "UPDATE `withraws` SET `status`='0',`request_date`='$now' WHERE `ID`='$reqId'");
    exit();

} else if (strpos($data, "eject") !== false) {
    $reqId = str_replace("eject", "", $data);

    bot('deleteMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id_when_inlineKeyboard_click
    ]);
    sendmk($startText, null, $chat_id, $mainKey, 'markdown');
    mysqli_query($conn, "DELETE FROM `withraws` WHERE `ID`='$reqId'");
    exit();

} else if ($data == "botOff") {
    mysqli_query($conn, "UPDATE `status` SET `status`='0'");
    answerQuery($answer_id, false, "ربات خاموش شد.");
} else if ($data == "botOn") {
    mysqli_query($conn, "UPDATE `status` SET `status`='1'");
    answerQuery($answer_id, false, "ربات روشن شد.");
} else if ($data == "increaseIncome") {
    setSteep($chat_id, $conn, "sendingChatIdForIncreaseIncome");
    bot('editMessageText', [
        'chat_id' => $chat_id,
        'text' => "چت ایدی کاربر موردنظر را وارد کنید:",
        'message_id' => $message_id_when_inlineKeyboard_click
    ]);
    exit();
} else if (strpos($data, "response") !== false) {
    $dts = str_replace("response", "", $data);
    $dts = explode("-", $dts);

    $user = $dts[0];
    $msgID = $dts[1];

    setSteepInfo($conn, "user", $user, $chat_id);
    setSteepInfo($conn, "msgID", $msgID, $chat_id);
    setSteep($chat_id, $conn, "sendingMessageForResponse");
    bot('deleteMessage', [
        'chat_id' => $chat_id, 'message_id' => $message_id_when_inlineKeyboard_click
    ]);
    sendmk("در جواب این پیام ، پیامتان را وارد کنید:", $message_id, $chat_id, $backKey, 'markdown');
    exit();

} else if ($data == "rejectSupport") {
    bot('deleteMessage', [
        'chat_id' => $chat_id, 'message_id' => $message_id_when_inlineKeyboard_click
    ]);
    exit();
}
//==============callbacks==============

//==============steeps=================

if ($steep == "sendingAmountForWithraw") {
    if (is_numeric($text)) {

        $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$chat_id'"));
        $balance = $getUser['balance'];

        if ($text >= $minBalanceForWithraw && $text <= $balance) {
            deleteSteep($conn, $steep, $chat_id);
            setSteep($chat_id, $conn, "sendingWalletForWithraw");
            setSteepInfo($conn, "amount", $text, $chat_id);

            sendm($chat_id, "ادرس کیف پول موردنظر را وارد کنید:", 'markdown');
        } else {
            sendm($chat_id, "حداقل مقدار برداشت $minBalanceForWithraw $arzname است.", 'markdown');
        }
    }
    exit();

} else if ($steep == "sendingWalletForWithraw") {
    $amount = getSteepInfo($conn, "amount", $chat_id);
    $wallet = $text;
    deleteAllSteeps($conn, $chat_id);

    mysqli_query($conn, "INSERT INTO `withraws` (`chat_id`,`wallet`,`amount`,`status`) VALUE ('$chat_id','$wallet','$amount','-1')");

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "مقدار برداشت: $amount $arzname\nکیف پول: $wallet",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "تایید ✅", 'callback_data' => "request" . mysqli_insert_id($conn)], ['text' => "حذف ❌", 'callback_data' => "eject" . mysqli_insert_id($conn)]
                ]
            ]
        ])
    ]);
    exit();

} else if ($steep == "sendingTxid") {

    $amount = getSteepInfo($conn, "amount", $chat_id);
    $user = getSteepInfo($conn, "user", $chat_id);
    $reqID = getSteepInfo($conn, "id", $chat_id);

    $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$user'"));

    $getRequest = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `withraws` WHERE `ID`='$reqID'"));
    $wallet = $getRequest['wallet'];
    $request_date = $getRequest['request_date'];

    $fullname = $getUser['fullname'];

    sendm($user, "درخواست برداشت شما به مقدار $amount $arzname انجام شد\nلینک تراکنش:\n$text", 'html');

    sendm($chat_id, "انجام شد✅", 'markdown');


    $now = jdate('Y/m/d H:i:s');

    sendm("@$transitionChannel", " با موفقیت واریز شد ✅

👤 اسم = $fullname
♻️ وضعیت =  انجام شده ✅
➿ آیدی عددی = <a href='tg://user?id=$user'>$user</a>
📤 تعداد برداشت  = $amount

 📆تاریخ درخواست برداشت =$request_date
🗓 تاریخ واریز  = $now

💳 آدرس والت = $wallet

⛑ لینک تراکنش : $text 


🤖 Bot = @$botID", 'html');

    mysqli_query($conn, "UPDATE `withraws` SET `status`='1',`link`='$text',`date`='$now' WHERE `ID`='$reqID'");


    deleteAllSteeps($conn, $chat_id);
    exit();
} else if ($steep == "sendingChatIdForIncreaseIncome") {
    deleteSteep($conn, $steep, $chat_id);
    setSteep($chat_id, $conn, "sendingAmountForIncreaseIncome");
    setSteepInfo($conn, "chat_id", $text, $chat_id);

    sendmk("مقداری که میخواهید اضافه کنید را وارد کنید:", $message_id, $chat_id, $backKey, 'markdown');

    exit();
} else if ($steep == "sendingAmountForIncreaseIncome") {


    $user = getSteepInfo($conn, "chat_id", $chat_id);
    $amount = $text;
    deleteAllSteeps($conn, $chat_id);
    $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$user'"));

    $newBalance = $getUser['balance'] + $amount;

    mysqli_query($conn, "UPDATE `users` SET `balance`='$newBalance' WHERE `chat_id`='$user'");
    sendm($user, "موجودی شما به مقدار $amount $arzname از طرف پشتیبانی افزایش یافت.\nموجودی جدید: $newBalance $arzname", 'markdown');
    sendm($chat_id, "انجام شد.", 'markdown');
    exit();

} else if ($steep == "sendingSupportMessage") {
    $user = "<a href='tg://user?id=$chat_id'>$chat_id</a>";
    if ($text != null) {
        bot('sendMessage', [
            'chat_id' => $supportAdmin,
            'text' => "پیام جدید از سوی کاربر $user:\n$text",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => 'پاسخ', 'callback_data' => "response$chat_id-$message_id"], ['text' => 'حذف', 'callback_data' => "rejectSupport"]
                    ]
                ]
            ]),
            'parse_mode' => 'html'
        ]);
        sendmk("پیام شما به ادمین ارسال شد.", $message_id, $chat_id, $mainKey, 'markdown');
        deleteSteep($conn, $steep, $chat_id);
    }
} else if ($steep == "sendingMessageForResponse") {
    if ($text != null) {
        $user = getSteepInfo($conn, "user", $chat_id);
        $msgID = getSteepInfo($conn, "msgID", $chat_id);


        sendmk("پیام جدید از پشتیبانی:\n\n$text", $msgID, $user, $mainKey, 'html');
        sendmk("انجام شد.", $message_id, $chat_id, $mainKey, 'markdown');

        deleteAllSteeps($conn, $chat_id);
    }
} else if ($steep == "sendingPhone") {

    $contact = $update->message->contact;

    if ($contact != null) {
        $phone_number = $contact->phone_number;

        if (substr($phone_number, 0, 1) != "+") {
            $phone_number = "+" . $phone_number;
        }

        $is_iran_number = substr($phone_number, 0, 3) == "+98";

        if ($contact->user_id == $chat_id) {
            if ($is_iran_number) {
                $txt = getSteepInfo($conn, "text", $chat_id);
                if (checkJoin($chat_id, $lockChannel1) && checkJoin($chat_id, $lockChannel2) && checkJoin($chat_id, $lockChannel3) && checkJoin($chat_id, $lockChannel4) && checkJoin($chat_id, $lockChannel5) && checkJoin($chat_id, $lockChannel6)) {
                    register($chat_id, $username, $fullname, $txt, $phone_number);
                    sendmk($startText, $message_id, $chat_id, $mainKey, 'markdown');
                }else{
                    bot('sendMessage', [
                        'text' => "لطفا ابتدا در کانال های زیر عضو شوید:",
                        'chat_id' => $chat_id,
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [
                                    ['text' => "کانال اول", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel1)]
                                ], [
                                    ['text' => "کانال دوم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel2)]
                                ], [
                                    ['text' => "کانال سوم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel3)]
                                ], [
                                    ['text' => "کانال چهارم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel4)]
                                ], [
                                    ['text' => "کانال پنجم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel5)]
                                ], [
                                    ['text' => "کانال ششم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel6)]
                                ],
                                [
                                    ['text' => "عضو شدم✅", 'callback_data' => "unlock$txt"]
                                ]
                            ]
                        ])
                    ]);
                    deleteAllSteeps($conn, $chat_id);

                    exit();
                }

            } else {
                deleteAllSteeps($contact, $chat_id);
                sendm($chat_id, "ورود به ربات تنها با شماره ایران امکان پذیر است.", 'markdown');
                exit();
            }
        } else {
            sendm($chat_id, "تقلب؟", 'markdown');
            exit();
        }

    }


}
//==============steeps=================
if (strpos($text, "/start") !== false) {

    $userQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$chat_id'");
    $getUser = mysqli_fetch_assoc($userQuery);
    $check_phone = $getUser['phone'] != '' && mysqli_num_rows($userQuery) >= 1;

    if ($check_phone) {
        if (checkJoin($chat_id, $lockChannel1) && checkJoin($chat_id, $lockChannel2) && checkJoin($chat_id, $lockChannel3) && checkJoin($chat_id, $lockChannel4) && checkJoin($chat_id, $lockChannel5) && checkJoin($chat_id, $lockChannel6)) {
            register($chat_id, $username, $fullname, $text);
            sendmk($startText, $message_id, $chat_id, $mainKey, 'markdown');
        } else {
            bot('sendMessage', [
                'text' => "لطفا ابتدا در کانال های زیر عضو شوید:",
                'chat_id' => $chat_id,
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "کانال اول", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel1)]
                        ], [
                            ['text' => "کانال دوم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel2)]
                        ], [
                            ['text' => "کانال سوم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel3)]
                        ], [
                            ['text' => "کانال چهارم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel4)]
                        ], [
                            ['text' => "کانال پنجم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel5)]
                        ],[
                            ['text' => "کانال ششم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel6)]
                        ],
                        [
                            ['text' => "عضو شدم✅", 'callback_data' => "unlock$text"]
                        ]
                    ]
                ])
            ]);
        }
    } else {
        bot('sendMessage', [
            'text' => "برای ادامه ی کار با ربات تیم (کوین 81) تایید کنید که با شماره مجازی وارد ربات نشدید!",
            'chat_id' => $chat_id,
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'ارسال شماره تلفن', 'request_contact' => true]],], 'resize_keyboard' => true])
        ]);
        setSteepInfo($conn, "text", $text, $chat_id);
        setSteep($chat_id, $conn, "sendingPhone");
    }
    exit();
}
if (checkJoin($chat_id, $lockChannel1) && checkJoin($chat_id, $lockChannel2) && checkJoin($chat_id, $lockChannel3) && checkJoin($chat_id, $lockChannel4) && checkJoin($chat_id, $lockChannel5) && checkJoin($chat_id, $lockChannel6)) {

    if ($text == "حساب کاربری 👤") {

        $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$chat_id'"));

        $dateOfStart = $getUser['date'];
        $hourOfStart = $getUser['hour'];
        $balance = $getUser['balance'];

        $referralsCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users` WHERE `refedBy`='$chat_id'"));

        $incomeFromReferrals = $referralsCount * $ArzPerReferral;

        sendm($chat_id, "
حساب کاربری  $fullname 
آیدی عددی شما : $chat_id

تاریخ عضویت شما در ربات : $dateOfStart $hourOfStart

〰️➰〰️➰〰️➰〰️➰〰️➰〰️➰〰️➰
 💰 موجودی فعلی شما: $balance $arzname

📥 تعداد $arzname دریافتی فعلی شما از طریق زیرمجموعه گیری : $incomeFromReferrals 

👥 تعداد کل زیرمجموعه هایه شما : $referralsCount نفر

کاربرمحترم ، پس از کسب حداقل $minBalanceForWithraw $arzname میتوانید از قسمت تسویه حساب برداشت کنید .✅", 'html');
    } else if ($text == "زیرمجموعه گیری 🚸") {
        $link = "https://t.me/$botID?start=$chat_id";

        bot('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => $botIconLink,
            'caption' => "
دریافت رایگان ارز $arzname از اولین ربات ایرانی😍

✅ لیست شده در صرافی ProBit
✅ رشد 380% در طول 7 روز 
✅ دریافت رایگان از طریق زیرمجموعه گیری و...
✅ هدیه خوش آمدگویی
✅ پرداخت آنی 


$link"
        ]);
        exit();
    } else if ($text == "راهنما تسویه حساب 📤⛑") {
        bot('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => $withrawHelpImageLink,
            'caption' => "برای برداشت میتواند از Trust Wallet استفاده کنید."
        ]);
        exit();
    } else if ($text == "تسویه حساب 📤") {
        $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$chat_id'"));
        $balance = $getUser['balance'];

        if ($balance >= $minBalanceForWithraw) {
            setSteep($chat_id, $conn, "sendingAmountForWithraw");
            sendmk("💰مقدار موجودی شما: $balance $arzname
📤حداقل برداشتی $minBalanceForWithraw $arzname
مقدار برای برداشت را وارد کنید:", $message_id, $chat_id, $backKey, 'markdown');
            exit();
        } else {
            sendm($chat_id, "حداقل مقدار برای برداشت $minBalanceForWithraw $arzname است و موجودی شما $balance $arzname\nبنابراین شرایط لازم برای برداشت را ندارید", 'markdown');
        }
        exit();
    } else if ($text == "گزارش تسویه حساب 📊") {
        $getReport = mysqli_query($conn, "SELECT * FROM `withraws` WHERE `chat_id`='$chat_id'");

        if (mysqli_num_rows($getReport) <= 0) {
            sendm($chat_id, "شما تابحال درخواست برداشتی نداده اید.", 'markdown');
            exit();
        }

        $msg = "";

        $counter = 1;
        while ($report = mysqli_fetch_array($getReport)) {
            $status = $report['status'];

            if ($status == 1 || $status == 0) {

                $finalStat = "";
                if ($status == 1) {
                    $finalStat = "پرداخت شد ✅";
                } else {
                    $finalStat = "درانتظار پرداخت⚠️";
                }

                $amount = $report['amount'];
                $wallet = $report['wallet'];
                $link = $report['link'];

                $msg .= "\n$counter-  تعداد $amount $arzname 
آدرس والت : $wallet
لینک تراکنش : $link
$finalStat
•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°•°\n";
            }

        }

        sendm($chat_id, $msg, 'html');
        exit();

    } else if ($text == "پشتیبانی⛑") {
        setSteep($chat_id, $conn, "sendingSupportMessage");
        sendmk("پیام خود را برای ارسال به ادمین وارد کنید:", $message_id, $chat_id, $backKey, 'markdown');
        exit();
    }
} else {
    bot('sendMessage', [
        'text' => "لطفا ابتدا در کانال های زیر عضو شوید:",
        'chat_id' => $chat_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "کانال اول", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel1)]
                ], [
                    ['text' => "کانال دوم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel2)]
                ], [
                    ['text' => "کانال سوم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel3)]
                ], [
                    ['text' => "کانال چهارم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel4)]
                ], [
                    ['text' => "کانال پنجم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel5)]
                ], [
                    ['text' => "کانال ششم", 'url' => "https://t.me/" . str_replace("@", "", $lockChannel6)]
                ], [
                    ['text' => "عضو شدم✅", 'callback_data' => "unlock/start"]
                ]
            ]
        ])
    ]);
    exit();
}
if ($text == "پنل" && $chat_id == $admin) {
    $allUsers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users`"));

    $todayDate = jdate('Y/m/d');
    $todayMembers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users` WHERE `date`='$todayDate'"));

    $last10MemberQuery = mysqli_query($conn, "SELECT * FROM `users` ORDER BY `ID` DESC LIMIT 10");

    $last10Members = "";

    while ($member = mysqli_fetch_array($last10MemberQuery)) {
        $user = $member['chat_id'];
        $user = "[$user](tg://user?id=$user)";

        $last10Members .= $user . "|";
    }

    $bestRefreres = mysqli_query($conn, "SELECT * FROM `users` ORDER BY `refersCount` DESC LIMIT 10");

    $counter = 1;
    $bestMsg = "";
    while ($member = mysqli_fetch_array($bestRefreres)) {
        $rotbe = "";

        if ($counter == 1) {
            $rotbe = "اول";
        } elseif ($counter == 2) {
            $rotbe = "دوم";

        } else if ($counter == 3) {
            $rotbe = "سوم";

        } else if ($counter == 4) {
            $rotbe = "چهارم";

        } else if ($counter == 5) {
            $rotbe = "پنجم";

        } else if ($counter == 6) {
            $rotbe = "ششم";

        } else if ($counter == 7) {
            $rotbe = "هفتم";

        } else if ($counter == 8) {
            $rotbe = "هشتم";

        } else if ($counter == 9) {
            $rotbe = "نهم";

        } else if ($counter == 10) {
            $rotbe = "دهم";

        }

        $refers = $member['refersCount'];
        $user = $member['chat_id'];

        $user = "[$user](tg://user?id=$user)";

        $bestMsg .= "نفر $rotbe با $refers زیرمجموعه: $user\n";

        $counter++;

    }

    //=

    $bestBalances = mysqli_query($conn, "SELECT * FROM `users` ORDER BY `balance` DESC LIMIT 3");

    $counter = 1;
    $bestBalanceMsg = "";
    while ($member = mysqli_fetch_array($bestBalances)) {
        $rotbe = "";

        if ($counter == 1) {
            $rotbe = "اول";
        } elseif ($counter == 2) {
            $rotbe = "دوم";

        } else {
            $rotbe = "سوم";

        }

        $balance = $member['balance'];
        $user = $member['chat_id'];

        $user = "[$user](tg://user?id=$user)";

        $bestBalanceMsg .= "نفر $rotbe با $balance موجودی: $user\n";

        $counter++;

    }


    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "تعداد کل اعضای ربات: $allUsers\nافراد عضو شده امروز: $todayMembers\n\nلیست 10 نفر اخر عضو شده:\n $last10Members\n\nبرترین افراد دعوت کننده: \n$bestMsg\nبرترین افراد با موجودی بالا:\n$bestBalanceMsg\n\nهر 1 نفر = $ArzPerReferral $arzname",
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => "ربات خاموش 🔴", 'callback_data' => "botOff"], ['text' => "ربات روشن 🟢", 'callback_data' => "botOn"]
                ], [
                    ['text' => "افزایش $arzname کاربر", 'callback_data' => "increaseIncome"]
                ]
            ]
        ]),
        'parse_mode' => "markdown"
    ]);

}


function register($chat_id, $username, $fullname, $text, $phone = '')
{
    $conn = $GLOBALS['conn'];

    $now = jdate('Y/m/d');
    $hour = jdate('H:i:s');

    $arzname = $GLOBALS['arzname'];
    $ArzPerReferral = $GLOBALS['ArzPerReferral'];
    $ArzInStart = $GLOBALS['ArzInStart'];

    $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$chat_id'")) <= 0;
    if ($check) {

        $referChatID = str_replace("/start ", "", $text);
        $has_refer = $referChatID != "/start";

        if ($has_refer) {
            $referChatID = str_replace("/start ", "", $text);
            mysqli_query($conn, "INSERT INTO `users` (`chat_id`,`username`,`fullname`,`refedBy`,`balance`,`date`,`hour`,`refersCount`,`phone`) VALUES ('$chat_id','$username','$fullname','$referChatID','$ArzInStart','$now','$hour','0','$phone')");

            sendm($referChatID, "🆕کاربر $fullname از طریق لینک شما به ربات پیوست و شما $ArzPerReferral $arzname کسب کردید.", 'html');

            $getRefer = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `chat_id`='$referChatID'"));
            $referBalance = $getRefer['balance'];
            $refersCount = $getRefer['refersCount'];

            $refersCount++;
            $referBalance += $ArzPerReferral;
            mysqli_query($conn, "UPDATE `users` SET `balance`='$referBalance',`refersCount`='$refersCount' WHERE `chat_id`='$referChatID'");

        } else {
            mysqli_query($conn, "INSERT INTO `users` (`chat_id`,`username`,`fullname`,`refedBy`,`balance`,`date`,`hour`,`refersCount`,`phone`) VALUES ('$chat_id','$username','$fullname','none','$ArzInStart','$now','$hour','0','$phone')");
        }

        sendm($chat_id, " 💰هر 5 دقیقه 0.05 ترون کلایم بزنید 

پرداختی اتومات✅

دقیقا سایتی مثل کلایم bnb

حداقل برداشت ۱۵ ترون

لینک سایت:
https://bankoftron40.com/?r=891

🔸آموزش:
وقتی سایت بالا اومد روی گزینه‌ی login بزنید و آدرس ترون خودتون رو وارد و هر ۵ دقیقه یک بار روی گزینه‌ی کلایم بزنید...
به همین راحتی👌🏼
لینک بالا رو کپی کنید ، تویه برنامه Trust Wallet قسمت Dapp وارد کنید
        سپاس از همراهی شما , تعداد $ArzInStart $arzname به حساب شما اضافه شد.", 'html');
    }
}

function checkJoin($chat_id, $channel)
{
    $isAdmin = bot('getChatMember', [
        'chat_id' => $channel,
        'user_id' => $chat_id
    ])->result->status;
    if ($isAdmin == "member" || $isAdmin == "administrator" || $isAdmin == "creator") {
        return true;
    } else {
        return false;
    }
}
/*
@jahanbots
••••••••••••••••••••••••••••••••••••••••••
کانال پر از سورس های منتوع 
jahanbots 
https://t.me/jahanbots
https://t.me/jahanbots
https://t.me/jahanbots
••••••••••••••••••••••••••••••••••••••••••
کص ننت اصکی بری منبع نزنی 
•••••••••••••••••••••
اصکی با منبع ازاد ✓
•••••••••••••••••••••
@jahanbots
*/
