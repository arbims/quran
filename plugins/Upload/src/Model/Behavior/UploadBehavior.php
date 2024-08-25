<?php

namespace Upload\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Intervention\Image\ImageManagerStatic;

class UploadBehavior extends Behavior {

	protected $defaultOptions = [
		'fields' => array(),
	];
	private $options = array();
	private $nameModel = '';

	public function __construct($model, $config) {
		$this->options[$config['model']] = array_merge($this->defaultOptions, $config);
		$this->nameModel = $config['model'];

		$this->width = $config['width'];
		$this->height = $config['height'];
		$this->ModelId = $config['id'] ?? false;
	}

	public function beforeSave(Event $event, EntityInterface $data, ArrayObject $options) {

		$width = $this->width;
		$height = $this->height;

		foreach ($this->options[$this->nameModel]['fields'] as $field => $path) {

			$field_name = $field . '_file';
			$field_file = $data->$field_name;
			if (is_object($field_file) && !empty($field_file->getClientFilename())) {

				if (file_exists(WWW_ROOT . $path . $data->$field) && !is_null($data->$field)) {
					unlink(WWW_ROOT . $path . $data->$field);
				}
				$path = WWW_ROOT . $path;
				if (!file_exists($path)) {
					mkdir($path, 0777, true);
				}
				$ext = pathinfo($field_file->getClientFilename(), PATHINFO_EXTENSION);
				$namefile = ($this->ModelId === true) ? md5($data->id) . '.' . $ext : md5(uniqid(60)) . '.' . $ext;
				if ($ext === 'svg') {
					$field_file->moveTo($path . $namefile);
				} else {
					if ($height) {
						ImageManagerStatic::make($field_file->getStream())->resize($width, $height)->save($path . $namefile);
					} else {
						ImageManagerStatic::make($field_file->getStream())->resize($width, null, function ($constraint) {
							$constraint->aspectRatio();
						})->save($path . $namefile);
					}
				}
				chmod($path . $namefile, 0777);
				$data->$field = $namefile;
			}
		}

		return true;
	}

	public function beforeDelete(Event $event, EntityInterface $data, ArrayObject $options) {
		foreach ($this->options[$this->nameModel]['fields'] as $field => $path) {
			if (file_exists(WWW_ROOT . $path . $data->$field)) {
				unlink(WWW_ROOT . $path . $data->$field);
			}
		}
		return true;
	}

}
