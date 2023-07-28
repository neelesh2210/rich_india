<?php

/**
 *   Copyright 2018 Vimeo.
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *   Unless required by applicable law or agreed to in writing, software
 *   distributed under the License is distributed on an "AS IS" BASIS,
 *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *   See the License for the specific language governing permissions and
 *   limitations under the License.
 */
declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => env('VIMEO_CLIENT', 'b9e21efc847e6a4ef1d3c44b8ac3f90161339891'),
            'client_secret' => env('VIMEO_SECRET', '/dnlRokcXfrPRLoIHYvroc6ekgJ82mZjTESUnztC1juBGg5pbZ9wENsb1A+xJb2UUn076wgGkomOIR9GxgKJyt3Lsfeub9hGPovOPy2oB8qyjujQ4z9AWUn6DCKA4zHx'),
            'access_token' => env('VIMEO_ACCESS', 'cfd92d5a802d19cc67e2bd4b5a1f7788'),
        ],

        'alternative' => [
            'client_id' => env('VIMEO_ALT_CLIENT', 'b9e21efc847e6a4ef1d3c44b8ac3f90161339891'),
            'client_secret' => env('VIMEO_ALT_SECRET', '/dnlRokcXfrPRLoIHYvroc6ekgJ82mZjTESUnztC1juBGg5pbZ9wENsb1A+xJb2UUn076wgGkomOIR9GxgKJyt3Lsfeub9hGPovOPy2oB8qyjujQ4z9AWUn6DCKA4zHx'),
            'access_token' => env('VIMEO_ALT_ACCESS', 'cfd92d5a802d19cc67e2bd4b5a1f7788'),
        ],

    ],

];
