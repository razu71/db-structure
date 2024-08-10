<?php

namespace App\Enums;

enum PostEnum
{
    public const DRAFT = 'draft';
    public const PUBLISHED = 'published';
    public const ARCHIVED = 'archived';
    public const DELETED = 'deleted';
}
