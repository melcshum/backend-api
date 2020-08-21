<?php


class  xAPISGFaker extends \Faker\Provider\Base
{
    public function xApiVerb()
    {
        $availableVerbs = [
            'access',
            'complet',
            'initialized',
            'interacted',
            'pressed',
            'progressed',
            'released',
            'selected',
            'skipped',
            'unlocked',
            'used'
        ];

        return $this->generator->randomElement($availableVerbs);
    }
    public function xApiObject()
    {
        $availableObject = [
            'item1', 'item2', 'item3',
            'quest1', 'quest2', 'quest3',
            'question1', 'question2', 'question3'

        ];
        return $this->generator->randomElement($availableObject);
    }

    public function xApiDefinition()
    {
        $availableObject = ['Card1', 'Card2', 'Card3'];
        return $this->generator->randomElement($availableObject);
    }

    public function xApiResult()
    {
        $availableObject = ['completed', 'skipped', 'progressing'];
        return $this->generator->randomElement($availableObject);
    }
    public function xApiActor()
    {
        $availableObject = ['Student1', 'Student2', 'Student3'];
        return $this->generator->randomElement($availableObject);
    }

    public function xApiProgressObject()
    {
        $availableObject = ['Select', 'Drag', 'Click'];

        return $this->generator->randomElement($availableObject);
    }
    public function xApiProgressValue()
    {
        $availableObject = [1, 2, 3];
        return $this->generator->randomElement($availableObject);
    }
}
