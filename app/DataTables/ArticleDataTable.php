<?php

namespace App\DataTables;

use App\Models\NewsArticle;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArticleDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<NewsArticle> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (NewsArticle $article) {
                return view('data_master.articles.action', compact('article'));
            })
            ->rawColumns(['title', 'summary', 'image', 'created_at', 'updated_at'])
            ->editColumn('title', function (NewsArticle $article) {
                $article_image = $article->image
                    ? asset('storage/' . $article->image)
                    : asset('assets/images/profile/user-1.jpg');

                return '
                    <div class="d-flex align-items-center">
                        <img src="' . $article_image . '" class="rounded-circle object-fit-fill me-2" width="40" height="40" alt="Profile Picture" />
                        <div>
                            <div class="fw-bold">' . e(\Illuminate\Support\Str::limit($article->title, 50)) . '</div>
                        </div>
                    </div>
                ';
            })
            ->editColumn('summary', function (NewsArticle $article) {
                return \Illuminate\Support\Str::limit($article->summary, 50);
            })
            ->editColumn('created_at', function (NewsArticle $article) {
                return Carbon::parse($article->created_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->editColumn('updated_at', function (NewsArticle $article) {
                return Carbon::parse($article->updated_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<NewsArticle>
     */
    public function query(NewsArticle $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('article-table')
                    ->setTableAttributes([
                        'class' => 'table table-striped table-bordered',
                        'cellspacing' => '0',
                    ])
                    ->stateSave(true)
                    ->autoWidth(false)
                    ->scrollX(true)
                    ->responsive(true)
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'searching' => false,
                    ])
                    ->orderBy(3)
                    ->selectStyleSingle()
                    ->initComplete('function(settings, json) {
                        var table = window.LaravelDataTables[\'article-table\'];

                        $(\'#input-search\').on(\'keyup\', function() {
                            var searchTerm = $(this).val().toLowerCase();

                            table.rows().every(function() {
                                var row = this.node();
                                var rowText = row.textContent.toLowerCase();

                                if (rowText.indexOf(searchTerm) === -1) {
                                    $(row).hide();
                                } else {
                                    $(row).show();
                                }
                            });
                        });
                    }')
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('title'),
            Column::make('summary'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Article_' . date('YmdHis');
    }
}
