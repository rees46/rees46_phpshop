<?
$_classPath="../../../";
include($_classPath."class/obj.class.php");
PHPShopObj::loadClass("base");
PHPShopObj::loadClass("system");
PHPShopObj::loadClass("orm");

$PHPShopBase = new PHPShopBase($_classPath."inc/config.ini");
include($_classPath."admpanel/enter_to_admin.php");


// Module configuration
PHPShopObj::loadClass("modules");
$PHPShopModules = new PHPShopModules($_classPath."modules/");


// Editor
PHPShopObj::loadClass("admgui");
$PHPShopGUI = new PHPShopGUI();

// SQL
$PHPShopOrm = new PHPShopOrm($PHPShopModules->getParam("base.rees46.rees46_system"));


// ������� ����������
function actionUpdate() {
    global $PHPShopOrm;
    $action = $PHPShopOrm->update($_POST);
    return $action;
}

// Initial loading function
function actionStart() {
    global $PHPShopGUI,$PHPShopSystem,$SysValue,$_classPath,$PHPShopOrm;

    $PHPShopGUI->dir=$_classPath."admpanel/";
    $PHPShopGUI->title="��������� ������";
    $PHPShopGUI->size="500,450";

	// �������
	$data = $PHPShopOrm->select();
	@extract($data);

    // ����������� ��������� ����
    $PHPShopGUI->setHeader("��������� ������ 'REES46'" , "���������", $PHPShopGUI->dir . "img/i_display_settings_med[1].gif");

    $Info = '<strong>������ �� ��������.</strong> ����������������� �� ����� <a target="_blank" href="http://rees46.com/ecommerce?utm_source=phpshop&utm_medium=configuration&utm_campaign=start_integration">REES46</a>, �������� �������� ShopID � SecretKey � �������� �� � ����� ����.';

    // ���������� �������� 1
    $tab_1 = $PHPShopGUI->setInfo($Info, 25, '95%');
	$tab_1 .= $PHPShopGUI->setField('* ShopID', $PHPShopGUI->setInput('input', 'shop_key_new', $shop_key, null, null, null, null, null, '', '������������� �������� � ������� REES46') );
	$tab_1 .= $PHPShopGUI->setField('* SecretKey', $PHPShopGUI->setInput('input', 'shop_secret_new', $shop_secret, null, null, null, null, null, '', '��������� ���� �������� � ������� REES46') );

    // ���������� �������� 2
    $tab_2 = $PHPShopGUI->setPay('� ������',false);

    // ����� ����� ��������
    $PHPShopGUI->setTab(array("���������", $tab_1, 270), array("� ������", $tab_2, 270));

    // ����� ������ ��������� � ����� � �����
    $ContentFooter=
//            $PHPShopGUI->setInput("hidden","newsID",$id,"right",70,"","but").
            $PHPShopGUI->setInput("button","","��������","right",70,"return onCancel();","but").
            $PHPShopGUI->setInput("submit","editID","���������","right",70,"","but","actionUpdate");

    $PHPShopGUI->setFooter($ContentFooter);
    return true;
}



// ** Launch module rendering

// If admin
if($UserChek->statusPHPSHOP < 2) {

    // Show form
    $PHPShopGUI->setLoader($_POST['editID'],'actionStart');

    // Process actions
    $PHPShopGUI->getAction();

} else {

	// Access denied
	$UserChek->BadUserFormaWindow();
}



