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
        // name
        $validator
            ->notEmptyString('name', 'الإسم إجباري ')
            ->minLength('name', 3, 'يجب أن يحتوي الإسم على ثلاث حروف على الأقل ');

        // email
        $validator
            ->notEmptyString('email', 'البريد الإلكتروني إجباري ')
            ->maxLength('email', 254)
            ->email('email', false, 'يجيب إدخال بريد إلكتروني صحيح ');

        // content
        $validator
            ->notEmptyString('content', 'المحتوى إجباري');

        return $validator;
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
