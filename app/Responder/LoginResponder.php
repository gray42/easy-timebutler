<?php

declare(strict_types=1);

namespace Nekudo\EasyTimebutler\Responder;

use Bloatless\Endocore\Http\Response;
use Bloatless\Endocore\Responder\JsonResponder;
use Nekudo\EasyTimebutler\Domains\Payload;

class LoginResponder extends JsonResponder
{
    /**
     * Generates response object to a login request.
     *
     * @param Payload $payload
     * @return Response
     */
    public function __invoke(Payload $payload): Response
    {
        $payloadResult = $payload->getResult();
        if ($payload->getStatus() === Payload::STATUS_FOUND) {
            return $this->found([
                'token' => $payloadResult['user']->token,
            ]);
        }

        return $this->error([$payloadResult['error'] ?? 'Unknown Error']);
    }
}
