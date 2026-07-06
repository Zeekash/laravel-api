<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyQuoteExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $quotes;
    
    public function __construct($quotes)
    {
        $this->quotes = $quotes;
    }

    public function collection()
    {
        return $this->quotes->map(function ($quote, $index) {
            return [
                '#'             => $index + 1,
                'Customer Name' => $quote->name,
                'Email'         => $quote->email,
                'Phone'         => $quote->phone_no,
                'Move Size'     => $quote->move_size,
                'Move From'     => $quote->zip_from,
                'Move To'       => $quote->zip_to,
                'Move Date'     => $quote->date,
                'Status'        => ucfirst(str_replace('_',' ', $quote->currentStage())),
                'Created Date'  => optional($quote->created_at)->format('d-m-Y'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            '#',
            'Customer Name',
            'Email',
            'Phone',
            'Move Size',
            'Move From',
            'Move To',
            'Move Date',
            'Status',
            'Created Date',
        ];
    }
}
