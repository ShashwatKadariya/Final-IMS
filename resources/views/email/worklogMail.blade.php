<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
 .table {
    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    vertical-align: top;
    border-color: #dee2e6;
}
.w-75{
    width:75%!important;
}
.p-3{padding:1rem!important}
.d-flex{
    display:flex!important;
    flex-direction: column;
    align-items: center;
    text-align: center;
}
.justify-content-center{
    justify-content:center!important;
}
.table > :not(caption) > * > * {
    padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
.table > tbody {
    vertical-align: inherit;
}
.table > thead {
    vertical-align: bottom;
}
.table > :not(:last-child) > :last-child > * {
    border-bottom-color: currentColor;
}
.caption-top {
    caption-side: top;
}
.table-sm > :not(caption) > * > * {
    padding: 0.25rem 0.25rem;
}
.table-bordered > :not(caption) > * {
    border-width: 1px 0;
}
.table-bordered > :not(caption) > * > * {
    border-width: 0 1px;
}
.table-borderless > :not(caption) > * > * {
    border-bottom-width: 0;
}
.table-striped > tbody > tr:nth-of-type(odd) {
    --bs-table-accent-bg: var(--bs-table-striped-bg);
    color: var(--bs-table-striped-color);
}
.table-active {
    --bs-table-accent-bg: var(--bs-table-active-bg);
    color: var(--bs-table-active-color);
}
.table-hover > tbody > tr:hover {
    --bs-table-accent-bg: var(--bs-table-hover-bg);
    color: var(--bs-table-hover-color);
}
.table-primary {
    --bs-table-bg: #cfe2ff;
    --bs-table-striped-bg: #c5d7f2;
    --bs-table-striped-color: #000;
    --bs-table-active-bg: #bacbe6;
    --bs-table-active-color: #000;
    --bs-table-hover-bg: #bfd1ec;
    --bs-table-hover-color: #000;
    color: #000;
    border-color: #bacbe6;
}
.table-secondary {
    --bs-table-bg: #e2e3e5;
    --bs-table-striped-bg: #d7d8da;
    --bs-table-striped-color: #000;
    --bs-table-active-bg: #cbccce;
    --bs-table-active-color: #000;
    --bs-table-hover-bg: #d1d2d4;
    --bs-table-hover-color: #000;
    color: #000;
    border-color: #cbccce;
}
.table-success {
    --bs-table-bg: #d1e7dd;
    --bs-table-striped-bg: #c7dbd2;
    --bs-table-striped-color: #000;
    --bs-table-active-bg: #bcd0c7;
    --bs-table-active-color: #000;
    --bs-table-hover-bg: #c1d6cc;
    --bs-table-hover-color: #000;
    color: #000;
    border-color: #bcd0c7;
}
.table-info {
    --bs-table-bg: #cff4fc;
    --bs-table-striped-bg: #c5e8ef;
    --bs-table-striped-color: #000;
    --bs-table-active-bg: #badce3;
    --bs-table-active-color: #000;
    --bs-table-hover-bg: #bfe2e9;
    --bs-table-hover-color: #000;
    color: #000;
    border-color: #badce3;
}
.table-warning {
    --bs-table-bg: #fff3cd;
    --bs-table-striped-bg: #f2e7c3;
    --bs-table-striped-color: #000;
    --bs-table-active-bg: #e6dbb9;
    --bs-table-active-color: #000;
    --bs-table-hover-bg: #ece1be;
    --bs-table-hover-color: #000;
    color: #000;
    border-color: #e6dbb9;
}
.table-danger {
    --bs-table-bg: #f8d7da;
    --bs-table-striped-bg: #eccccf;
    --bs-table-striped-color: #000;
    --bs-table-active-bg: #dfc2c4;
    --bs-table-active-color: #000;
    --bs-table-hover-bg: #e5c7ca;
    --bs-table-hover-color: #000;
    color: #000;
    border-color: #dfc2c4;
}
.table-light {
    --bs-table-bg: #f8f9fa;
    --bs-table-striped-bg: #ecedee;
    --bs-table-striped-color: #000;
    --bs-table-active-bg: #dfe0e1;
    --bs-table-active-color: #000;
    --bs-table-hover-bg: #e5e6e7;
    --bs-table-hover-color: #000;
    color: #000;
    border-color: #dfe0e1;
}
.table-dark {
    --bs-table-bg: #212529;
    --bs-table-striped-bg: #2c3034;
    --bs-table-striped-color: #fff;
    --bs-table-active-bg: #373b3e;
    --bs-table-active-color: #fff;
    --bs-table-hover-bg: #323539;
    --bs-table-hover-color: #fff;
    color: #fff;
    border-color: #373b3e;
}
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
@media (max-width: 575.98px) {
    .table-responsive-sm {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
}
@media (max-width: 767.98px) {
    .table-responsive-md {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
}
@media (max-width: 991.98px) {
    .table-responsive-lg {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
}
@media (max-width: 1199.98px) {
    .table-responsive-xl {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
}

    </style>
</head>
<body class="d-flex justify-content-center">
    <div class="main w-75 p-3">
    
        <p style="color: black;">This is the worklog of all interns</p>
        <table class="table">
            
            <thead>
                <tr class="table-success">
            <th scope="col">Name</th>
            <th scope="col">Work Done</th>
            <th scope="col">Hours Worked</th>
        </tr>
    </thead>
    @foreach ($work_logs as $worklog)
    <tbody>
        <tr>
            <th>{{ $worklog->user->full_name }}</th>
            <th>{{ $worklog->work }}</th>
            <th>{{ $worklog->hours_worked }}</th>
            
        </tr>
        
        
    </tbody>
    @endforeach
    </table>
    </div>
  
</body>
</html>
    
