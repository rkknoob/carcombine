<?php
use App\Models\Contact;
use App\Models\Interested;
use App\Models\Wishlist;

function date_thai($dt, $time = false)
{
    $Month = [1 => "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

    $y = date("Y", strtotime($dt))+543;
    $m = date("n", strtotime($dt));
    $d = date("j", strtotime($dt));

    $h = date("H",strtotime($dt));
  	$i = date("i",strtotime($dt));
    $s = date("s",strtotime($dt));

    $datetime = $time == TRUE ? $d.' '.$Month[$m].' '.$y.' || '.$h.':'.$i : $d.' '.$Month[$m].' '.$y;

    return $datetime;
}

function num($number) {
    return number_format($number);
}

function contact_count()
{
    return Contact::where('read', 0)->count();
}

function contact_unread()
{
    return Contact::where('read', 0)->GetDesc();
}

function interested_count()
{
    return Interested::where('Status', 'New')->count();
}

function interested_new()
{
    return Interested::where('Status', 'New')->GetDesc();
}

function wishlist_count()
{
    return Wishlist::where('status', 'new')->count();
}

function wishlist_new()
{
    return Wishlist::where('status', 'new')->GetDesc();
}

