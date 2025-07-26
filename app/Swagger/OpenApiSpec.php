<?php

/**
 * @OA\Info(
 *     title="Miiri API",
 *     version="1.0.0",
 *     description="Guests can view News, Publications, and Innovations. Authenticated users can create, update, and delete."
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Miiri API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="apiKey",
 *     name="Authorization",
 *     in="header"
 * )
 */
