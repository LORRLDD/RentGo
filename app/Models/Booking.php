namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'Bookings';
    protected $primaryKey = 'BookingID';

    protected $fillable = [
        'CustomerID','CarID','PickupDate',
        'ReturnDate','TotalAmount','BookingStatus'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'CarID');
    }
}