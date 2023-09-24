<?php
    
namespace App\Repositories\Pagination;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    /**
     * @var stdClass[]
     */
    private array $items ;

    public function __construct(
        protected LengthAwarePaginator $paginator,
    ) { 
        $this->items = $this->resolveItems($this->paginator->items());
    }

    public function items(): array
    {
        return $this->items;
    }

    public function links(): Htmlable
    {
        return $this->paginator->links();
    }

    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }

    public function isLastPage(): bool
    {
        return $this->paginator->onLastPage();
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }

    public function resolveItems(array $array): array
    {
        $response = [];
        foreach ($array as $item) {
            $stdClassObject = new stdClass;
            foreach ($item->toArray() as $key => $value) {
                $stdClassObject->{$key} = $value;
            }
            array_push($response, $stdClassObject);
        }
    
        return $response;
    }
}