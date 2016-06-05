<?php
require '../vendor/autoload.php';

class MailObserver implements \SplObserver
{
    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        var_dump($subject);
        $sendgrid = new SendGrid("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");
        $email    = new SendGrid\Email();
        $email->addTo($subject->email)->
        setFrom("marcoaacoliveira@gmail.com")->
        setSubject('Bem vindo a cenntral de marcações da UFBA!')->
        setHtml('
            Olá %yourname%,
            <br/>
            <br/>
            Seu cadastro foi realizado com sucesso no centro de marcações online da UFBA.
            ')->
        addSubstitution("%yourname%", array($subject->login))->
        addHeader('X-Sent-Using', 'SendGrid-API')->
        addHeader('X-Transport', 'web');
        $sendgrid->send($email);
    }
}
