<?php

class CMessages
{
	public function GetObject()
	{
		$message = new Message();
		return (new DivElement())
			->addElement(
				(new DivElement())
				->addElement(new H1Element('','Новые сообщения'))
				->addElement($message->GetUnReadMessages())
			)
			->addElement(
				(new DivElement())
				->addElement(new H1Element('','Прочитанные сообщения'))
				->addElement($message->GetReadMessages())
			)
			->addElement(
				(new DivElement())
				->addElement(new H1Element('','Новое сообщение'))
				->addElement(new AElement('',"/route/Messages/add",'Написать сообщение'))
			);
	}
}
?>



