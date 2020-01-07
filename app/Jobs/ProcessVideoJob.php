<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProcessVideoJob
 *
 * @package App\Jobs
 *
 *  Все тайминги задаются в секундах.
 *
 */
class ProcessVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * +
     * Кол-во попыток запуска задания. $job->payload->maxTries
     * По-умолчанию == 1;
     *
     * Если указано $tries, то задача помещается в очередь и будет выполнена
     * через [0, dispatch()->delay()] сек. Если произошел сбой, то
     * следующая попытка будет через [$job->retryAfter ?? 0] сек.
     *
     * Аналог:
     * php artisan queue:listen --tries=1 --delay=0
     * (без инициализации поля $job->payload->maxTries)
     *
     *
     * В случае сбоя/ошибки/тп :
     *  1) $job->attemps += 1;
     *  2) $job->available_at = now() + $job->retryAfter ?? 0;
     *
     * @var int
     */
    //public $tries = 5;


    /**
     * +
     * Количество секунд ожидания перед повторной попыткой выполнения задания
     * ($job->available_at)
     *
     * Аналог:
     * php artisan queue:listen --delay=0
     * !!! Ключ --delay НЕ одно и тоже с dispatch()->delay() !!!
     *
     *
     * @var int
     */
    //public $retryAfter = 30;

    /**
     * +
     * @var int (Timestamp) Метка времени указывающая когда прекратить
     * повторные выполнения задания.
     *
     * Аналог:
     * можно создать метод $job->retryUntil():int
     */
    //public $timeoutAt = 1575050188;


    /**
     * Разрешенное время (сек) выполнения задания
     * (Если время превышено, то задание считается проваленным
     * - мастер очереди убивает процесс воркера (убирает задачу из очереди))
     *
     * Требуется выполнения условия timeout < queue.connection.retry_after
     * Иначе мастер очереди запустит задачу вновь и одна задача может
     * быть выполнена дважды.
     *
     * На текущий момент
     * !!! При указании свойства - условие логики не отрабатывает !!!
     *
     * Аналог:
     * php artisan queue:listen --timeout=4
     * По-умолчанию == 60
     *
     * @var int
     */
    //public $timeout = 4;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    /**
     * Альтернатива свойству  $job->timeoutAt
     *
     * @return int
     */
//    public function retryUntil()
//    {
//        //dd(__METHOD__);
//
//        return now()->addMinute()->getTimestamp();
//    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "start;";
        for ($i = 0; $i <= 100; $i++) {
            sleep(1);
        }
        echo "finish;\n";
        //$d = 1 / 0;
    }
}
