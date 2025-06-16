<?php

namespace App;

enum Role: string
{
    case ADMIN = 'admin';
    case VIEWER = 'viewer';
    case EDITOR = 'editor';
}
