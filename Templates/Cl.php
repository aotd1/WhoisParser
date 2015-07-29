<?php

namespace Novutec\WhoisParser\Templates;

use Novutec\WhoisParser\Templates\Type\Regex;

class Cl extends Regex {

    protected $blocks = array(
        0 => '/ACE:\s*(.*?)\(/ims',
        1 => '/RFC\-[0-9]+\)\s*(.*?)Contacto Administrativo/ims',
        2 => '/Administrative Contact\):(.*?)Contacto /ims',
        3 => '/Technical Contact\):(.*?)Servidores/ims',
        4 => '/Domain Servers\):(.*?)(Expiration date|More information)/ims',
        5 => '/Expiration date\):(.*?)\n/i',
    );

    protected $blockItems = array(
        0 => array(
            '/ACE:\s*(.*?)\(/ims' => 'name',
        ),
        1 => array(
            '/RFC\-[0-9]+\)\s*(.*?)\s+Contacto Administrativo/ims' => 'contacts:owner:organization',
        ),
        2 => array(
            '/Nombre\s*:\s*(.*?)$/im' => 'contacts:admin:name',
            '/Organizaci.n\s*:\s*(.*?)$/im' => 'contacts:admin:organization',
        ),
        3 => array(
            '/Nombre\s*:\s*(.*?)$/im' => 'contacts:tech:name',
            '/Organizaci.n\s*:\s*(.*?)$/im' => 'contacts:tech:organization',
        ),
        4 => array(
            '/Domain Servers\):\s*(.*?)\s+\n\n/ims' => 'nameserver',
        ),
        5 => array(
            '/Expiration date\):\s*(.*?)\n/i' => 'expires'
        ),
    );

    protected $available = '/: no existe/i';
}
