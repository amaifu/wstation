<?php

/**
 * Built assets aren't currently routeable via vercel-php
 * Manually route assets to be found
 * https://github.com/juicyfx/vercel-examples/commit/1fcbe3ff98ae34830cfd779224433cca16bb4f93
 */

header("Content-type: text/css; charset: UTF-8");
echo require __DIR__ . '/../public/build/assets/app-DejA6GR2.css';
header('Content-Type: application/javascript; charset: UTF-8');
echo require __DIR__ . '/../public/build/assets/app-OfeCqFc7.js';