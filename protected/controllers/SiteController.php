<?php
require_once ('utils/utils.php');
              
class SiteController extends Controller
{
  
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

  public function get_pages(){

    $rows = Yii::app()->db->createCommand()
          ->select('pag.layout, pag.is_without_login')
          ->from('spi_page pag')
          ->queryAll();
    
    $pages = array();
    foreach($rows as $row){
      $pages[$row['layout']] = array('layout'            => $row['layout']
                                      , 'is_without_login'  => $row['is_without_login']
                                      );
    };
    return $pages;
  }

  public function actionIndex() {
		$page = safe($_GET,'page','dashboard');
    $pages = $this->get_pages();
		$pageInfo = safe($pages,$page);
    session_start();
    
		if(safe($pageInfo,'layout')) {
//      $this->layout = $pageInfo['layout'];
      $this->layout = 'main';
      if($pageInfo['is_without_login']){
        $this->render(safe($pageInfo,'render',$page));
      } else {
        if($_SESSION['rights'][$page] && $_SESSION['rights'][$page]['show']){  
          $this->render(safe($pageInfo,'render',$page));
        } else {
          $this->redirect('/login');
        }
      }
			
		} else {
//      $this->redirect('/');
    }

  }
    


	public function actionError() {
		if(safe(Yii::app()->errorHandler->error, 'code') === 404) {
			$this->redirect('404');
		}
	}
	
	public function beforeRender($view) {
		if($view === '404') {
			if(!safe($_COOKIE, 'isLogined')) {
				$this->layout = 'mainWithoutLogin';
			}
			header("HTTP/1.0 404 Page not found");
		}
		return true;
	}

}