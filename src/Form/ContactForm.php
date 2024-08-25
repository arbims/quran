<?php
declare(strict_types=1);

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

/**
 * Contact Form.
 */
class ContactForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
      return $schema->addField('name', 'string')
        ->addField('email', ['type' => 'string'])
        ->addField('body', ['type' => 'text']);
    }

    public function validationDefault(Validator $validator): Validator
    {
      return $validator->add('name', 'length', [
        'rule' => ['minLength', 4],
        'message' => 'Un nom est requis'
      ])->add('email', 'format', [
        'rule' => 'email',
        'message' => 'Une adresse email valide est requise',
      ]);
    }

    /**
     * Defines what to execute once the Form is processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data): bool
    {
        return true;
    }
}
