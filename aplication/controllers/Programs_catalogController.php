<?php
class Programs_catalogController extends Controller
{

	function __construct($parentUri, $childUri)
	{
//		echo '<pre>';
//		echo '<br>' . 'PARENT :::: ' . $parentUri;
//		echo '<br>' . 'CHILD :::: ' . $childUri;
//		echo '</pre>';
		parent::__construct($parentUri);
		$data = $this->model->getMainData();
//		echo '<pre>';
//		print_r($data);
//		echo '</pre>';
//		$pageInfo = $this->getData($data, empty($childUri) ? $parentUri : $childUri);

//		if (empty($pageInfo)) {
//			$this->errorPage404();
//		}
//		$childContent = $this->getChildContent($data, $pageInfo['id']);
//		echo '<pre>';
//		print_r($childContent);
//		echo '</pre>';
//		$href = array();
//		foreach ($pageInfo['parent_path'] as $item => $key) {
//			array_push($href, array('title' => $pageInfo['parent_path']["$item"] = $this->getTitlePage($data, $item),
//                'page_name' => $item, 'href' => $this->getHrefs($data, $item)));
//		}
//		$allData = array('pageInfo' => $pageInfo, 'childContent' => $childContent, 'href' => $href);
//		$parentUri = $pageInfo['page_type'] . '_tamplate';
		$parentUri = "dtek_academy_newsite/main";
//			echo '<br>' . 'PARENT_URI ::: ' .  $parentUri;

//			echo '<pre>';
//			print_r($href);
//			echo '</pre>';
		$this->view->render($parentUri, $data);

	}

//	public function getData($array, $pattern)
//	{
//		static $result = array();
//
//		if (is_array($array)) {
//			foreach ($array as $element) {
//				if (isset($element['page_name']) && $element['page_name'] === $pattern) {
//
//					foreach ($element as $item => $key) {
//						$result["$item"] = $key;
//					}
//				} else {
//					$this->getData($element, $pattern);
//				}
//			}
//		}
//		return $result;
//	}

//	public function getChildContent($array, $parentPage)
//	{
//		static $result = array();
//
//		if (is_array($array)) {
//			foreach ($array as $element) {
//				if (isset($element['parent_page']) && $element['parent_page'] === $parentPage) {
//
//					array_push($result, array($element['title'], $element['page_name'], $element['parent_path']));
//				} else {
//					$this->getChildContent($element, $parentPage);
//				}
//			}
//		}
//		return $result;
//	}
//
//	public function getTitlePage($array, $id)
//	{
//		static $result = array();
//
//		if (is_array($array)) {
//			foreach ($array as $element) {
//
//				if (isset($element['page_name']) && $element['page_name'] === $id) {
//					$result = $element['title'];
//				} else {
//					$this->getTitlePage($element, $id);
//				}
//			}
//		}
//		return $result;
//	}
//
//	public function getHrefs($array, $id)
//	{
//
//		static $result;
//
//		if (is_array($array)) {
//			foreach ($array as $element) {
//
//				if (isset($element['page_name']) && $element['page_name'] === $id) {
//					$result = implode('/', array_keys($element['parent_path']));
//				} else {
//					$this->getHrefs($element, $id);
//				}
//			}
//		}
//		return $result;
//	}
//
//	function errorPage404() {
//		$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
//		header('HTTP/1.1 404 Not Found');
//		header("Status: 404 Not Found");
//		header('Location:' . $host . '404');
//	}
}