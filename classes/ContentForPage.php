<?php

class DataForPage
{
    protected $content = [];
    protected $currentPageData;
    protected $router;

    public function __construct($router)
    {
        $this->router = $router;
        $this->currentPageData = $this->router->GetPageData();
    }
    public function SelectContent()
    {
        if (!empty($this->currentPageData)){
            if  (class_exists ("C". key($this->currentPageData))) {
                $class =  "C" . key($this->currentPageData);
                if ($this->isDetailPage() == true){
                    $this->content = (new $class())->GetObject($this->router->getSubPathID());
                } else {
                    $this->content = (new $class())->GetObject();
                }
            }
        }
    }
    public function isDetailPage()
    {
       return (bool) $this->currentPageData[key($this->currentPageData)]['detail'] ?? false;
    }
    public function GetContent()
    {
        return $this->content;
    }
    public function GetTitle()
    {
        if (!empty($this->currentPageData)){
            return $this->currentPageData[key($this->currentPageData)]['title'];
        }
    }
    public function GetDescription()
    {
        if (!empty($this->currentPageData)){
             return $this->currentPageData[key($this->currentPageData)]['description'];
        }
    }
    public function setDescription($PageName, String $newDescription)
	{
        if (!empty($this->currentPageData)){
            if(key($this->currentPageData) == $PageName)
            {
                $this->currentPageData[key($this->currentPageData)]['description'] = $newDescription;
            }
        }
	}

	public function setTitle($PageName, String $newTitle)
	{
        if (!empty($this->currentPageData)){
            if(key($this->currentPageData) == $PageName)
            {
                $this->currentPageData[key($this->currentPageData)]['title'] = $newTitle;
            }
        }

	}
}
