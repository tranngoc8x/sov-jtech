<?

/**
 * Class TestCell
 */
class TestCell extends Cell {

	/**
	 * Return any settings for this cell which can be overridden by the controller or view
	 * @return array
	 */
	public function settings () {
		return array(
				'title' => 'My Hardcoded Title',
			'data' => array(
				'foo' => 'bar',
				'bar' => 'foo',
			),
		);
	}

	public function beforeRender() {
		$this->set('title', $this->settings['title']);
		$this->set('data', print_r($this->settings['data'], true));
	}
}
