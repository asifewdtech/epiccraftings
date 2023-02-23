<?php

    namespace App\Exports;

    use App\Order;
    use Illuminate\Contracts\View\View;
    use Maatwebsite\Excel\Concerns\Exportable;
    use Maatwebsite\Excel\Concerns\FromView;
    use Maatwebsite\Excel\Concerns\ShouldAutoSize;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use Maatwebsite\Excel\Concerns\WithEvents;
    use Maatwebsite\Excel\Events\AfterSheet;

    class OrdersExport implements FromView,ShouldAutoSize,WithEvents
    {
        use Exportable;
        // load view and export
        public function view():View
        {
            return view('admin.orders.export_index',['orders'=>Order::all()]);
        }

        // change styles and anything else
        public function registerEvents(): array
        {
            return [
                AfterSheet::class    => function(AfterSheet $event) {
                    $event->sheet->getStyle('A1:W1')->applyFromArray(
                        [
                            'font' => [
                                'bold' => true,
                            ]
                        ]
                    );
                },
            ];
        }
    }