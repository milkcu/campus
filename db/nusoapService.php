<?php
    require_once("lib/nusoap.php");
    require_once 'inc/db_all.php';
    $server = new soap_server;
    //避免乱码
    $server->soap_defencoding = 'UTF-8';
    $server->decode_utf8 = false;
    $server->xml_encoding = 'UTF-8';
    $server->configureWSDL('sayHello');//打开wsdl支持
    // post begin
    $server->configureWSDL('get_post_json');
    $server->configureWSDL('get_plist_json');
    $server->configureWSDL('get_post_count');
    $server->configureWSDL('add_post');
    $server->configureWSDL('update_post');
    $server->configureWSDL('del_post');
    // post end
    // school begain
    $server->configureWSDL('get_school_json');
    $server->configureWSDL('add_school');
    $server->configureWSDL('modify_school');
    $server->configureWSDL('del_school');
    $server->configureWSDL('login_suser');
    $server->configureWSDL('get_slist_json');
    // school end
    // comment begin
    $server->configureWSDL('add_comment');
    $server->configureWSDL('del_comment');
    $server->configureWSDL('get_clist_json');
    $server->configureWSDL('get_comment_count');
    // comment end
    // category begain
    $server->configureWSDL('get_cat_json');
    $server->configureWSDL('get_catlist_json');
    $server->configureWSDL('add_cat');
    $server->configureWSDL('del_cat');
    $server->configureWSDL('modify_cat');
    // category end
    // soption begin
    $server->configureWSDL('get_soption_json');
    $server->configureWSDL('modify_slide');
    $server->configureWSDL('modify_intro');
    // soption end
    $server->configureWSDL('WebService');
	/*
	 注册需要被客户端访问的程序
	类型对应值：bool->"xsd:boolean"   string->"xsd:string"
	int->"xsd:int"    float->"xsd:float"
	*/
	// register nusoap function sayHello begin
	$server->register( 'sayHello',    //方法名
			array("name"=>"xsd:string", "last"=>"xsd:int"),    //参数，默认为"xsd:string"
			array("return"=>"xsd:string") );//返回值，默认为"xsd:string"
	// post begain
	$server->register('get_post_json',
			array("pid"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('get_plist_json',
			array("id"=>"xsd:string", "page"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('get_post_count',
			array("id"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('add_post',
			array("catid"=>"xsd:string", "ptitle"=>"xsd:string", "pdetail"=>"xsd:string", "uid"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('update_post',
			array("pid"=>"xsd:string", "catid"=>"xsd:string", "ptitle"=>"xsd:string" ,"pdetail"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('del_post',
			array("pid"=>"xsd:string"),
			array("return"=>"xsd:string"));
	// post end
	// comment begain
	$server->register('add_comment',
			array("pid"=>"xsd:string", "uname"=>"xsd:string", "cdetail"=>"xsd:string", "uemail"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('del_comment',
			array("cid"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('get_clist_json',
			array("id"=>"xsd:string", "page"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('get_comment_count',
			array("id"=>"xsd:string"),
			array("return"=>"xsd:string"));
	// comment end
	// category begain
	$server->register('get_cat_json',
			array("catid"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('get_catlist_json',
			array("sid"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('add_cat',
			array("sid"=>"xsd:string", "catname"=>"xsd:string", "catdesc"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('del_cat',
			array("catid"=>"xsd:string"),
			array("return"=>"xsd:string"));
	$server->register('modify_cat',
			array("catid"=>"xsd:string", "catname"=>"xsd:string", "catdesc"=>"xsd:string"),
			array("return"=>"xsd:string"));
	// category end
    // school begain
    $server->register('get_school_json',
    		array("sid"=>"xsd:string"),
    		array("return"=>"xsd:string"));
    $server->register('add_school',
    		array("sname"=>"xsd:string", "sdesc"=>"xsd:string", "suser"=>"xsd:string",
    				"spwd"=>"xsd:string", "semail"=>"xsd:string"),
    		array("return"=>"xsd:string"));
    $server->register('modify_school',
    		array("sid"=>"xsd:string", "sname"=>"xsd:string", "sdesc"=>"xsd:string",
    				"semail"=>"xsd:string", "suser"=>"xsd:string", "spwd"=>"xsd:string"),
    		array("return"=>"xsd:string"));
    $server->register('del_school',
    		array("sid"=>"xsd:string"),
    		array("return"=>"xsd:string"));
    $server->register('login_suser',
    		array("suser"=>"xsd:string", "spwd"=>"xsd:string"),
    		array("return"=>"xsd:string"));
    $server->register('get_slist_json',
    		array(""=>""),
    		array("return"=>"xsd:string"));
    // school end
    // soption begain
    $server->register('get_soption_json',
    		array("sid"=>"xsd:string"),
    		array("return"=>"xsd:string"));
    $server->register('modify_slide',
    		array("sid"=>"xsd:string",
    				"slide1i"=>"xsd:string", "slide1h"=>"xsd:string", "slide1p"=>"xsd:string", "slide1a"=>"xsd:string", "slide1b"=>"xsd:string",
    				"slide2i"=>"xsd:string", "slide2h"=>"xsd:string", "slide2p"=>"xsd:string", "slide2a"=>"xsd:string", "slide2b"=>"xsd:string",
    				"slide3i"=>"xsd:string", "slide3h"=>"xsd:string", "slide3p"=>"xsd:string", "slide3a"=>"xsd:string", "slide3b"=>"xsd:string"),
    		array("return"=>"xsd:string"));
    $server->register('modify_intro',
    		array("sid"=>"xsd:string",
    				"intro1h"=>"xsd:string", "intro1a"=>"xsd:string", "intro1p"=>"xsd:string",
    				"intro2h"=>"xsd:string", "intro2a"=>"xsd:string", "intro2p"=>"xsd:string",
    				"intro3h"=>"xsd:string", "intro3a"=>"xsd:string", "intro3p"=>"xsd:string",
    				"intro4h"=>"xsd:string", "intro4a"=>"xsd:string", "intro4p"=>"xsd:string",
    				"intro5h"=>"xsd:string", "intro5a"=>"xsd:string", "intro5p"=>"xsd:string",
    				"intro6h"=>"xsd:string", "intro6a"=>"xsd:string", "intro6p"=>"xsd:string"),
    		array("return"=>"xsd:string"));
    // soption end
    //isset 检测变量是否设置
    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    //service 处理客户端输入的数据
    $server->service($HTTP_RAW_POST_DATA);
    /**
     * 供调用的方法
     * @param $name
    */
    function sayHello($name, $last) {
    	return "Hello, $name!$last";
    }
    // post begin
    function get_post_json($pid) {
    	return json_encode(get_post($pid));
    }
    function get_plist_json($id, $page) {
    	return json_encode(get_plist($id, $page));
    }
    // post end
    // comment begain
    function get_clist_json($id, $page) {
    	return json_encode(get_clist($id, $page));
    }
    // comment end
    // category begin
    function get_cat_json($sid) {
    	return json_encode(get_cat($sid));
    }
    function get_catlist_json($sid) {
    	return json_encode(get_catlist($sid));
    }
    // category end
    // soption begin
    function get_soption_json($sid) {
    	return json_encode(get_soption($sid));
    }
    // soption end
    // school begin
    function get_school_json($sid) {
    	return json_encode(get_school($sid));
    }
    function get_slist_json() {
    	return json_encode(get_slist());
    }
    // school end
    
