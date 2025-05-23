import java.util.ArrayList;

public class BasicArrayList {
    public static void main(String[] args) {
        ArrayList<Integer> basic = new ArrayList<>();
        
        // First for-loop (initialization)
        for (int i = 0; i < 4; i++) {
            basic.add(i + 1);
        }
        
        for (int i = 0; i < basic.size(); i++) {
            basic.set(i, basic.get(i) * 5);
        }

        for (int i = 0; i < basic.size(); i++) {
            System.out.println(basic.get(i));
        }
        // Adding a new element at position 0
        basic.add(0, 0);
        System.out.println("Modified ArrayList: " + basic);
    }
}