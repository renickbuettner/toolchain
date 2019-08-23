<?php

namespace Toolchain\Http\Controllers;

use Dotenv\Exception\InvalidFileException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Toolchain\Service;

class HelpController extends Controller {

    private $faq;

    public function __construct() {
        try {
            $this->faq = json_decode(Storage::disk('local')->get('faq.json'), false);

        } catch (\Exception $e) {
            throw new InvalidFileException('The service (faq.json) could not be loaded. '.$e->getMessage());
        }
    }

    public function helpcenter() {
        if (request()->wantsJson()) {
            return json_encode($this->faq);
        }

        return view('helpcenter', ['faq' => $this->faq]);
    }

}
