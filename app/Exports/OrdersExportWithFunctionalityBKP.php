<?php
    namespace App\Exports;
    use App\Order;
    use Illuminate\Contracts\View\View;
    use Maatwebsite\Excel\Concerns\Exportable;
    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\FromView;
    use Maatwebsite\Excel\Concerns\FromQuery;
    use Maatwebsite\Excel\Concerns\ShouldAutoSize;
    use Maatwebsite\Excel\Concerns\WithMapping;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use Maatwebsite\Excel\Concerns\WithEvents;
    use Maatwebsite\Excel\Events\AfterSheet;
    use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
    use Maatwebsite\Excel\Concerns\WithDrawings;

    class OrdersExport implements FromQuery,ShouldAutoSize,WithMapping,WithHeadings,WithEvents,WithDrawings
    {
        use Exportable;
        // for large use query otherwise collection any thing else
        public function query()
        {
            return Order::query()->with('orderDetails');
        }

        // select require columns and make array
        public function map($order):array
        {
            return [
                date('d-m-Y h:i a',strtotime($order->created_at)),
                $order->order_number,
            ];
        }

        // column name
        public function headings():array
        {
            return [
                'Created At',
                'Order Number',
            ];
        }
        // change styles and anything else
        public function registerEvents(): array
        {
            return [
                AfterSheet::class    => function(AfterSheet $event) {
                    $event->sheet->getStyle('A1:B1')->applyFromArray(
                        [
                            'font' => [
                                'bold' => true,
                            ]
                        ]
                    );
                },
            ];
        }

        // add image or logo
        public function drawings()
        {
            $drawing = new Drawing();
            $drawing->setName('Logo');
            $drawing->setDescription('This is my logo');
            $image = 'http://localhost/laravelprojects/oneoncraftlarave/storage/uploads/screenshot_6197411ae10ff.png';
            $image = str_replace('http://localhost/laravelprojects/oneoncraftlarave/','',$image);
            $drawing->setPath(public_path($image));
            $drawing->setWidth(40);
            $drawing->setHeight(40);
            $drawing->setCoordinates('C3');
            return $drawing;
        }
    }

