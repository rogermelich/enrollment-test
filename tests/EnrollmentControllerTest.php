<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Scool\Enrollment\Models\Enrollment\Enrollment;
use Scool\Enrollment\Repositories\EnrollmentRepository;

class EnrollmentControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function __construct()
    {
        $this->repository = Mockery::mock(EnrollmentRepository::class);
        //$this->login();
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function notLogged()
    {
        $this->get('enrollments');
        $this->assertRedirectedTo('login');
    }

    public function createDumnyEnrollments()
    {

        $enrollment1 = new Enrollment();
        $enrollment2 = new Enrollment();
        $enrollment3 = new Enrollment();

        $enrollments = [
            $enrollment1,
            $enrollment2,
            $enrollment3
        ];
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
//        dd(route('enrollment.index'));
//        $enrollments = factory(\Scool\Enrollment\Models\Enrollment\Enrollment::class,50)->create();
        $this->login();

        $this->repository->shoulReceive('all')->once()->andReturn(
            $this->createDumnyEnrollments());

        $this->app->instance(Enrollment::class, $this->repository);

        $this->repository->shoulReceive('pushCriteria')->once;


        $this->get('enrollments');
        $this->assertResponseOk();
        $this->assertViewHasAll('enrollments');

        $enrollments = $this->response->getOriginalContent()->getData()['enrollments'];

        $this->assertInstanceOf(Illuminate\Database\Eloquent\Collection::class,$enrollments);
    }

    public function testStore()
    {
        $this->login();
        $this->post('enrollments')->dump();
//        $this->assertRedirectedToRoute('enrollment.create');
    }

    public function login()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
    }
}
