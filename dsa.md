Bài này mình có thể áp dụng kĩ thuật hai con trỏ (two pointers).

Thuật toán này có thời gian: O(n) và không gian: O(1) nếu sử dụng phương pháp hai con trỏ, hoặc O(n) nếu sử dụng mảng phụ left_max và right_max.

Chúng ta có đặt 2 con trỏ left ở đầu mảng(index=0) và right ở cuối mảng(index= lenght-1).
Sau đó tiến hành so sánh left và right:
 - Nếu height[left] nhỏ hơn hoặc bằng height[right], ta sẽ kiểm tra lượng nước có thể đọng lại tại vị trí left dựa trên left_max và di chuyển con trỏ left về phía phải.
- Ngược lại, nếu height[right] nhỏ hơn, ta kiểm tra lượng nước đọng tại vị trí right dựa trên right_max và di chuyển con trỏ right về phía trái.

Mình sẽ làm đến khi 2 con trỏ gặp nhau

Tổng lượng nước giữ lại là tổng của tất cả các lượng nước đã tính ở mỗi bước.
