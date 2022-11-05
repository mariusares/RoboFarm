import javax.swing.*;
import java.awt.*;
import java.util.Queue;

public class Main {

    public static void main(String[] args) {

        ShapesManager shapesManager = new ShapesManager();
        shapesManager.setDisplayName(false);
        shapesManager.setDisplayBoundingBox(false);

        shapesManager.addShape(new Circle(Color.blue, true, 600, 80, 50));
      //  Rectangle rect = new Rectangle( Color.blue, true, 100,100, 120 , 80 );
     //   shapesManager.addShape( rect );
        Square square = new Square( Color.GREEN, true, 600,240, 80 , 80 );
        Rectangle rectangle = new Rectangle( Color.red, true, 400,400, 180 , 80 );
        shapesManager.addShape( square );
        shapesManager.addShape( rectangle );

        Quadrilateral quad1 = new Quadrilateral( new Point(80,80), new Point( 50 ,50 ),new Point (120, 70), new Point (100,120), new Point(40,90) );
        shapesManager.addShape(quad1);

        CustomWindow customWindow = new CustomWindow(shapesManager);
        customWindow.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        customWindow.setTitle("Marius Window");
        customWindow.setVisible(true);

        System.out.println( "Hello world!" );
    }

}