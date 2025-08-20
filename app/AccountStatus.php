<?php

namespace App;

enum AccountStatus: string
{
    case Active = 'Active'; // after email is verified
    case Suspended = 'Suspended'; // breag of usage or deniening access
    case inActive = 'inActive'; // not loggedin in long ltime
    case onHold = 'onHold'; //before email is verified
}
