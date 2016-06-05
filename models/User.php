<?php

class User extends Model implements \SplSubject
{
    /**
     * @var \SplObjectStorage
     */
    protected $observers;

    public function __construct($params=[])
    {
        parent::__construct($params);
        $this->observers = new \SplObjectStorage();
    }

    public function save()
    {
        $this->securePassword();
        $result = parent::save();
        if($result){
            $this->observers->attach(new \MailObserver());
            $this->notify();
        }
        return $result;
    }

    public function verifyPassword($pass){
        return $this->password==md5($pass);
    }


    private function securePassword()
    {
        $this->password = md5($this->password);
    }


    /**
     * @param \SplObserver $observer
     *
     * @return void
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @param \SplObserver $observer
     *
     * @return void
     */
    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * @return void
     */
    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

}