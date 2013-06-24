<?php
/*
    <extension>
      <sidn-ext-epp:ext>
        <sidn-ext-epp:create>
          <sidn-ext-epp:contact>
            <sidn-ext-epp:legalForm>BV</sidn-ext-epp:legalForm>
            <sidn-ext-epp:legalFormRegNo>8764654.0</sidn-ext-epp:legalFormRegNo>
          </sidn-ext-epp:contact>
        </sidn-ext-epp:create>
      </sidn-ext-epp:ext>
    </extension>
 */
class sidnEppCreateRequest extends eppCreateRequest
{


    function __construct($createinfo)
    {
        parent::__construct($createinfo);
        
        if ($createinfo instanceof eppContact)
        {
            $this->addExtension('xmlns:sidn-ext-epp','http://rxsd.domain-registry.nl/sidn-ext-epp-1.0');
            $this->addSidnExtension($createinfo);
        }
        $this->addSessionId();
    }

    private function addSidnExtension(eppContact $contact)
    {
        $postal = $contact->getPostalInfo(0);
        if (strlen($postal->getOrganisationName()))
        {
            $ext = $this->createElement('extension');
            $sidnext = $this->createElement('sidn-ext-epp:ext');
            $create = $this->createElement('sidn-ext-epp:create');
            $contact = $this->createElement('sidn-ext-epp:contact');
            $contact->appendChild($this->createElement('sidn-ext-epp:legalForm','ANDERS'));
            #$contact->appendChild($this->createElement('sidn-ext-epp:legalFormRegNo','8764654.0'));
            $create->appendChild($contact);
            $sidnext->appendChild($create);
            $ext->appendChild($sidnext);
            $this->command->appendChild($ext);
        }

    }
}