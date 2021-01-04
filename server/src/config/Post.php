<?php

use Psr\Http\Message\ServerRequestInterface as Request;

class Post
{
    public static function getPostParams(Request $request): array
    {
        $contentType = $request->getHeaderLine('Content-Type');

        if (strstr($contentType, 'application/json')) {
            $contents = json_decode(file_get_contents('php://input'), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $request = $request->withParsedBody($contents);
            }
        }

        return ((array)$request->getParsedBody());
    }
}