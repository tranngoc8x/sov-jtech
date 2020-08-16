<?php
 /** *@author Trần Ngọc Thắng *@link fb.comm/tranngoc8x *@since cake v2.4 **/App::uses('AppController', 'Controller');
/**
 * Galleries Controller
 *
 * @property Gallery $Gallery
 * @property PaginatorComponent $Paginator
 */
class ImagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function admin_addimage($id = null){
		if (empty($id) && empty($this->request->data)) {
			return $this->redirect(array('controller'=>'galleries','action' => 'index'));
		}
		$this->Image->Gallery->recursive = -1;
		if ($this->request->is('post')) {
			$this->Image->create();
			$t = count($this->request->data['Image']['url']);
			$data = array();
			for ($i=0; $i < $t-1 ; $i++ ) {
					$data[$i]['url'] = $this->request->data['Image']['url'][$i];
			}
			//debug($data);
			if ($this->Image->saveAll($data)) {
				$this->Session->setFlash(__('Đã lưu thành công.'));
				return $this->redirect(array('controller'=>'galleries','action' => 'index'));
			} else {
				$this->Session->setFlash(__('Có lỗi khi lưu ảnh.'));
			}
		}
		$this->set('galleries',$id);
	}
	public function admin_index($id=null)
	{
        if ($this->request->is('post')) {
            $this->Image->id = $this->request->data['actived'];
            $this->Image->saveField('actived', 1);
            $this->Image->id = $this->request->data['oldactive'];
            $this->Image->saveField('actived', 0);
        }
		if (empty($id)) {
			return $this->redirect(array('controller'=>'galleries','action' => 'index'));
		}
		$result = $this->Image->find('all',array('conditions'=>array('galleries_id'=>$id)));
		$this->set('result',$result);
		$this->set('id',$id);

	}
	public function admin_mdelete($str = null){
		$arr = explode(",", $str);
		foreach ($arr as $k => $v):
			$this->Image->id = $v;
			if ($this->Image->exists()) {

			$this->request->onlyAllow('get', 'admin_mdelete');
			if ($this->Image->delete()) {
				$this->Session->setFlash(__('The news has been deleted.'));
			} else {
				$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
			}}
		endforeach;
		return $this->redirect(array('action' => 'index'));
	}
	public function admin_delete($id = null,$cid) {
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid Image'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Image->delete()) {
			$this->Session->setFlash(__('The Image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index',$cid));
	}
}
