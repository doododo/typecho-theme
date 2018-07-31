<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
} ?>
<?php $this->need('header.php'); ?>
<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if (strpos($ua, 'MicroMessenger')) {
    $type = 'wepay';
    $name = '微信支付';
    //微信支付链接
    $url = 'wxp://f2f0kTXjXbW-QPIlNdRDLlz87ZD29FBDbaJo';
    $icon_img = '<img src="http://ww2.sinaimg.cn/large/005zWjpngy1fojrwgr20oj303k03kglg.jpg" width="48px" height="48px" alt="'.$name.'">';
} elseif (strpos($ua, '95516.com')) {
    $type = 'zhaohang';
    $name = '招商银行';
    $url = 'https://qr.95516.com/49990010/RDR201806072118008681805213';
    $icon_img = '';
} elseif (strpos($ua, 'AlipayClient')) {
    //支付宝链接
    $url = 'https://qr.alipay.com/tsx09551sst2svw7kicy185';
    header('location: ' . $url);
} elseif (strpos($ua, 'QQ/')) {
    $type = 'qq';
    $name = 'QQ钱包支付';
    //QQ钱包支付链接
    $url = 'https://i.qianbao.qq.com/wallet/sqrcode.htm?m=tenpay&a=1&u=82220797&ac=2387E199035108BB71E6FD631077C2991ACC07648E4EBE0BC9ABEAFDF1549364&n=%E5%A4%A7%E8%84%B8%20%20%E1%83%A6%EF%BE%9F&f=wallet';
    $icon_img = '<img src="http://ww2.sinaimg.cn/large/005zWjpngy1fojrvmp427j303k03kjrb.jpg" width="48px" height="48px" alt="'.$name.'">';
} else {
    $type = 'other';
    $name = '打赏作者';
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $icon_img = '<img src="http://ww2.sinaimg.cn/large/005zWjpngy1fojs089x6tj303k03kjr6.jpg" width="48px" height="48px" alt="'.$name.'">';
}
$qr_img = '<img src="http://qr.liantu.com/api.php?text='.urlencode($url).'">';
?>
<main class="container">
    <div class="wrap min">
        <section class="page-title">
            <?=$icon_img?>
            <h2><?php echo $name ?></h2>
        </section>
        <article class="page-content">
            <?=$type=='other'?$qr_img.'<h4>请使用支付宝、微信、QQ客户端扫码付款</h4>':$qr_img.'<h4>扫描或长按识别二维>码，向TA付款</h4>'?>
        </article>
    </div>
</main>

<?php $this->need('footer.php'); ?>
