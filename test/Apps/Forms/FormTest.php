<?php

namespace CedricZiel\MattermostPhp\Test\Apps\Forms;

use CedricZiel\MattermostPhp\Apps\Call;
use CedricZiel\MattermostPhp\Apps\Forms\Field;
use CedricZiel\MattermostPhp\Apps\Forms\Form;
use CedricZiel\MattermostPhp\Apps\Forms\SelectOption;
use CedricZiel\MattermostPhp\Apps\Forms\TextFieldSubtype;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Form::class)]
class FormTest extends TestCase
{
    #[Test]
    public function canCreateForm()
    {
        $form = Form::create('title', Call::create('submit'));

        $this->assertInstanceOf(Form::class, $form);

        $jsonObject = $form->jsonSerialize();

        $this->assertEquals('title', $jsonObject->title);
        $this->assertEquals('submit', $jsonObject->submit->path);
    }

    #[Test]
    public function canAddFields()
    {
        $form = Form::create('title', Call::create('submit'))
            ->addField(Field::createText('field1'))
            ->addField(Field::createText('field2'))
            ->addField(
                Field::createText('field3', TextFieldSubtype::E_MAIL)
                    ->setRequired()
            )
        ;

        $jsonObject = $form->jsonSerialize();

        $this->assertEquals('title', $jsonObject->title);
        $this->assertEquals('submit', $jsonObject->submit->path);
        $this->assertCount(3, $jsonObject->fields);
        $this->assertEquals('field1', $jsonObject->fields[0]->name);
        $this->assertEquals('field2', $jsonObject->fields[1]->name);

        $this->assertEquals('field3', $jsonObject->fields[2]->name);
        $this->assertEquals(TextFieldSubtype::E_MAIL, $jsonObject->fields[2]->subtype);
    }

    #[Test]
    public function canCreateSelectFields(): void
    {
        $form = Form::create('title', Call::create('submit'))
            ->addField(
                Field::createStaticSelect('field1')
                    ->addOption(SelectOption::create('label', 'value'))
            )
            ->addField(
                Field::createDynamicSelect('field2', Call::create('lookup'))
            )
            ->addField(Field::createUserSelect('field3'))
            ->addField(Field::createChannelSelect('field4'))
            ->addField(Field::createBool('field5'))
        ;

        $jsonObject = $form->jsonSerialize();

        $this->assertEquals('title', $jsonObject->title);
        $this->assertEquals('submit', $jsonObject->submit->path);
        $this->assertCount(5, $jsonObject->fields);

        $this->assertEquals('field1', $jsonObject->fields[0]->name);
        $this->assertCount(1, $jsonObject->fields[0]->options);

        $this->assertEquals('field2', $jsonObject->fields[1]->name);
        $this->assertEquals('lookup', $jsonObject->fields[1]->lookup->path);

        $this->assertEquals('field3', $jsonObject->fields[2]->name);
        $this->assertEquals('field4', $jsonObject->fields[3]->name);
    }
}
