<?php

namespace App\Http\Controllers;

use App\Models\Book;
use mysql_xdevapi\Collection;

class BookController extends Controller
{
    public function getAll()
    {
        return Book::all();
    }

    public function findById(int $id)
    {
        return Book::all()->find($id)->first();
    }

    public function findBySlug(string $slug)
    {
        return Book::all()->where('slug', '=', $slug)->first();
    }

    public function findByYear(int $year)
    {
        return Book::all()->where('year', '=', $year);
    }

    public function findByMaxPages(int $maxPages)
    {
        return Book::all()->where('pages', '<=', $maxPages);
    }

    public function findBySearchTerm(string $search)
    {
        $search = strtoupper($search);
        $results = array();
        foreach (Book::all() as $book) {
            if (str_contains(strtoupper($book->title), $search) || str_contains(strtoupper($book->author), $search)) {
                $results[] = $book;
            }
        }
        return $results;
    }

    public function getNumberOfBooks(): int
    {
        return Book::all()->count();
    }

    public function getAvgPages(): int
    {
        $sumPages = 0;
        foreach (Book::all() as $book) {
            $sumPages += $book->pages;
        }
        return $sumPages / Book::all()->count();
    }

    public function getDashboard(): string {
        return "number of books: " . $this->getNumberOfBooks() . ", average pages: " . $this->getAvgPages();
    }
}
