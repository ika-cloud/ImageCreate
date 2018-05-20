<?php
/**
 * Created by IntelliJ IDEA.
 * User: ika
 * Date: 2018/05/19
 * Time: 0:53
 */
// フォントファイルのパス
$fontFilePath = './font/JKG-L_3.ttf';

// 台紙のイメージ
$imageBase = imagecreatefrompng('./image/base.png');

// 透過を使えるように設定
imagealphablending($imageBase, true);
imagesavealpha($imageBase, true);

// 文字色の設定
$text1Color = imagecolorallocate($imageBase, 255, 255, 255);
$text2Color = imagecolorallocate($imageBase, 0, 255, 0);

// テキストサイズの定義
$text1Size = 50;
$text2Size = 100;

// テキストを描画したらどんなエリアになるかを取得
$text1Box = imagettfbbox($text1Size, 0, $fontFilePath, 'テキスト1');
$text2Box = imagettfbbox($text2Size, 0, $fontFilePath, 'テキスト2');

// テキストの描画（中央寄せ）
imagettftext($imageBase , $text1Size, 0, ceil((640-$text1Box[2])/2),  100 , $text1Color, $fontFilePath, 'テキスト1');
imagettftext($imageBase , $text2Size, 0, ceil((640-$text2Box[2])/2),  500 , $text2Color, $fontFilePath, 'テキスト2');

$dstImagePath = './dest/'.microtime(true).'.png';
try {
    // イメージの書き出し
    imagepng($imageBase , $dstImagePath);
} catch (Exception $e) {

} finally {
    // 後処理（メモリの解放）
    imagedestroy($imageBase);
}
