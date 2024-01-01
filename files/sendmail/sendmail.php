<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	/*
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'user@example.com';                     //SMTP username
	$mail->Password   = 'secret';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	*/

	//От кого письмо
	$mail->setFrom('from@gmail.com', 'celicom.pro'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('celicom.pro'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'celicom.pro';

	// zakaz@celicom.pro


	// zakaz@celicom.pro

	//Тело письма
	$body = '<h1>письмо!</h1>';

	if(trim(!empty($_POST['username']))){
		$body.='<p><strong>имя:</strong>'.$_POST['username']. '</p>';
	}		
	if(trim(!empty($_POST['userphone']))){
		$body.='<p><strong>телефон пользователя:</strong> '.$_POST['userphone']. '</p>';
	}	
	if(trim(!empty($_POST['userdate']))){
		$body.='<p><strong>назначенная дата:</strong> '.$_POST['userdate']. '</p>';
	}	
	if(trim(!empty($_POST['usermail']))){
		$body.='<p><strong>почта пользователя</strong> '.$_POST['usermail']. '</p>';
	}		
	if(trim(!empty($_POST['usertime']))){
		$body.='<p><strong>назначенное время</strong> '.$_POST['usertime']. '</p>';
	}		
	if(trim(!empty($_POST['usermessage']))){
		$body.='<p><strong>описание задачи:</strong> '.$_POST['usermessage']. '</p>';
	}	
	if(trim(!empty($_POST['materials']))){
		$body.='<p><strong>материалы:</strong> '.$_POST['materials']. '</p>';
	}	
	if(trim(!empty($_POST['datestart']))){
		$body.='<p><strong>Срок сдачи готового ролика от:</strong> '.$_POST['datestart']. '</p>';
	}		
	if(trim(!empty($_POST['dateend']))){
		$body.='<p><strong>Срок сдачи готового ролика до:</strong> '.$_POST['dateend']. '</p>';
	}		
	if(trim(!empty($_POST['timing']))){
		$body.='<p><strong>Планируемый хронометраж ролика:</strong> '.$_POST['timing']. '</p>';
	}		
	if(trim(!empty($_POST['scenario']))){
		$body.='<p><strong>сценарий ролика:</strong> '.$_POST['scenario']. '</p>';
	}		
	if(trim(!empty($_POST['booking']))){
		$body.='<p><strong>букингом актеров:</strong> '.$_POST['booking']. '</p>';
	}		
	if(trim(!empty($_POST['studio']))){
		$body.='<p><strong>специализированная студия:</strong> '.$_POST['studio']. '</p>';
	}		
	if(trim(!empty($_POST['referencemessage']))){
		$body.='<p><strong>Референсы :</strong> '.$_POST['referencemessage']. '</p>';
	}	
	if(trim(!empty($_POST['format-video']))){
		$body.='<p><strong>формат :</strong> '.$_POST['format-video']. '</p>';
	}	
	if(trim(!empty($_POST['format-anim']))){
		$body.='<p><strong>формат :</strong> '.$_POST['format-anim']. '</p>';
	}	
	if(trim(!empty($_POST['format-3d']))){
		$body.='<p><strong>формат :</strong> '.$_POST['format-3d']. '</p>';
	}	
	if(trim(!empty($_POST['format-aero']))){
		$body.='<p><strong>формат :</strong> '.$_POST['format-aero']. '</p>';
	}	
	if(trim(!empty($_POST['format-no']))){
		$body.='<p><strong>формат :</strong> '.$_POST['format-no']. '</p>';
	}	
	if(trim(!empty($_POST['style-c']))){
		$body.='<p><strong>Стиль ролика :</strong> '.$_POST['style-c']. '</p>';
	}	
	if(trim(!empty($_POST['style-k']))){
		$body.='<p><strong>Стиль ролика :</strong> '.$_POST['style-k']. '</p>';
	}	
	if(trim(!empty($_POST['style-d']))){
		$body.='<p><strong>Стиль ролика :</strong> '.$_POST['style-d']. '</p>';
	}	
	if(trim(!empty($_POST['ownversion']))){
		$body.='<p><strong>Стиль ролика :</strong> '.$_POST['ownversion']. '</p>';
	}	
	/*
	//Прикрепить файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//путь загрузки файла
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузим файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото в приложении</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>